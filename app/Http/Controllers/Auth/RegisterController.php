<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\VerifyUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccountVerifMail;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number' => ['required', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'password' => $data['password'],
        ]);
    }

    public function verifyUser($token)
    {
        $verifyUser = VerifyUser::where('token', $token)->first();

        if(isset($verifyUser)){
            
            $user = $verifyUser->user;

            if(!$user->verified) {

                $verifyUser->user->verified = 1;

                $verifyUser->user->save();

                $status = "Votre e-mail a été vérifié. Veuillez à présent procéder à la réinitialisation de votre mot de passe.";

                if (($user->password_change_at == null)) {
                    return redirect(route('change_password', $user->id))->with('success', $status);
                }
                
            } else {
                $status = "Votre e-mail a été déja vérifié. Vous pouvez à présent vous connecter.";
                return redirect('/login')->with('success', $status);
            }
        } else {
            return redirect('/login')->with('warning', "Désolé, votre adresse email ne peut pas être identifié!");
        }
        //return redirect('/login')->with('success', $status);
    }

    public function firstChangePassword()
    {
        return view('auth.password');
    }

    public function postFirstChangePassword(Request $request)
    {
        //Validate password fields
        $this->validate($request, [
            'user_id' => 'required',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        ],

        $messages = [
            'new_password.required' => 'Le champ Nouveau mot de passe est obligatoire.',
            'confirm_password.required' => 'Le champ Confirmation mot de passe est obligatoire.',
            'confirm_password.same' => 'Les champ Mot de passe et Confirmation mot de passe ne correspondent pas.',
        ]);

        $user = User::findOrFail($request->input('user_id')); //Get user specified by id

        $user->password = $request->input('new_password');

        $user->password_changed_at = Carbon::now();

        $user->save();

        return redirect('/login')->with('success', 'Votre mot de passe a été mise à jour avec succès. Vous pouvez à présent vous connecter!');

    }
}
