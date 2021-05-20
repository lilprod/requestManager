<?php

namespace App\Http\Controllers;

use App\Models\Ressource;
use App\Models\Partner;
use App\Models\Operator;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendPassChangeCode;
use App\Mail\VerifyMail;

class ProfilController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::findOrFail(auth()->user()->id);

        if($user->role_id == 2){

            $staff = Partner::where('user_id', auth()->user()->id)->first();

            return view('profils.index', compact('staff', 'user'));

        }elseif($user->role_id == 3){

            $institustion = Operator::where('user_id', auth()->user()->id)->first();

            return view('profils.index', compact('institustion', 'user'));

        }elseif($user->role_id == 4){

            $ressource = Ressource::where('user_id', auth()->user()->id)->first();

            return view('profils.index', compact('ressource', 'user'));

        }

        return view('profils.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    public function setting()
    {
        return view('profils.setting');
    }

    public function editProfil()
    {
        return view('profils.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = auth()->user()->id;

        $user = User::findOrFail($user_id);

        //Validate name, email and password fields
        $this->validate($request, [
            'name' => 'required|max:120',
            'firstname' => 'nullable|max:120',
            'email' => 'required|email|unique:users,email,'.$user_id,
            'address' => 'required',
            'phone_number' => 'required',
            'profile_picture' => 'image|nullable',
            'birth_date' => 'nullable',
            'gender' => 'nullable',
            'address' => 'nullable',
            'city' => 'required',
            'postal_code' => 'required',
        ]);

        if ($request->hasfile('profile_picture')) {
            // Get filename with the extension
            $fileNameWithExt = $request->file('profile_picture')->getClientOriginalName();

            // Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // Get just ext
            $extension = $request->file('profile_picture')->getClientOriginalExtension();

            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            // Upload Image
            $path = $request->file('profile_picture')->storeAs('public/profile_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $name = $request->input('name');
        $firstname = $request->input('firstname');
        $email = $request->input('email');
        $address = $request->input('address');
        $phone_number = $request->input('phone_number');

        if($user->role_id == 2){

            $staff = Partner::where('user_id', $user->id)->first();
            $user->name = $name;
            $user->firstname = $firstname;
            $user->email = $email;
            $user->address = $address;
            $user->phone_number = $phone_number;
            if ($request->hasfile('profile_picture')) {
                $user->profile_picture = $fileNameToStore;
            }

            if ($request['city'] != '') {
                $user->city = $request['city'];
            }

            if ($request['postal_code'] != '') {
                $user->postal_code = $request['postal_code'];
            }

            $staff->name = $name;
            $staff->firstname = $firstname;
            $staff->email = $email;
            $staff->address = $address;
            $staff->phone_number = $phone_number;
            if ($request->hasfile('profile_picture')) {
                $staff->profile_picture = $fileNameToStore;
            }
            $user->save();
            $staff->save();
        }else if($user->role_id == 3){

            $institustion = Operator::where('user_id', $user->id)->first();
            $user->name = $name;
            $user->email = $email;
            $user->address = $address;
            $user->phone_number = $phone_number;

            if ($request['city'] != '') {
                $user->city = $request['city'];
            }

            if ($request['postal_code'] != '') {
                $user->postal_code = $request['postal_code'];
            }
            if ($request->hasfile('profile_picture')) {
                $user->profile_picture = $fileNameToStore;
            }

            $institustion->name = $name;
            $institustion->email = $email;
            $institustion->address = $address;
            $institustion->phone_number = $phone_number;
            if ($request->hasfile('profile_picture')) {
                $institustion->profile_picture = $fileNameToStore;
            }
            $user->save();
            $institustion->save();
        }else if($user->role_id == 4){

            $ressource = Ressource::where('user_id', $user->id)->first();
            $user->name = $name;
            $user->email = $email;
            $user->address = $address;
            $user->phone_number = $phone_number;
            if ($request->hasfile('profile_picture')) {
                $user->profile_picture = $fileNameToStore;
            }

            $ressource->name = $name;
            if ($request['firstname'] != '') {
                $ressource->name = $request['firstname'];
                $user->firstname = $request['firstname'];
            }
            $ressource->email = $email;
            $ressource->address = $address;
            $ressource->phone_number = $phone_number;
            if ($request->hasfile('profile_picture')) {
                $ressource->profile_picture = $fileNameToStore;
            }

            if ($request['gender'] != '') {
                $ressource->gender = $request['gender'];
            }

            if ($request['birth_date'] != '') {
                $ressource->birth_date = $request['birth_date'];
            }

            if ($request['city'] != '') {
                $ressource->city = $request['city'];
                $user->city = $request['city'];
            }

            if ($request['postal_code'] != '') {
                $ressource->postal_code = $request['postal_code'];
                $user->postal_code = $request['postal_code'];
            }
            $user->save();
            $ressource->save();
        } else{

            $user->name = $name;
            $user->firstname = $firstname;
            $user->email = $email;
            $user->address = $address;
            $user->phone_number = $phone_number;

            if ($request['city'] != '') {
                $user->city = $request['city'];
            }

            if ($request['postal_code'] != '') {
                $user->postal_code = $request['postal_code'];
            }
            if ($request->hasfile('profile_picture')) {
                $user->profile_picture = $fileNameToStore;
            }

            $user->save();

        }
        
        return redirect('profils')->with('success', 'Profil mis à jour');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function unique_code($limit)
    {
        return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function changePassword(){

    	return view('profils.setting');
    }

    public function postEmail(Request $request)
    {
        //Validate email field
        $this->validate($request, [
            'email' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if($user){

            $user->token = sha1(time());

            $user->save();
            
            Mail::to($user->email)->send(new VerifyMail($user));

            return redirect()->back()->with('success', 'Nous vous avons envoyé un code d\'activation. 
            Vérifiez votre email et cliquez sur le lien pour vérification de votre compte.');

        } else {
            return redirect()->back()->with('error', "Désolé, votre adresse email ne peut pas être identifié!");
        }

    }

    public function verifyUser($token)
    {
        $user = User::where('token', $token)->first();

        if($user){

            $status = "Votre e-mail a été vérifié. Vous pouvez à présent procéder à la modification de votre mot de passe.";

            return redirect()->route('confirm_change_password')->with('success', $status);
            
        } else {

            return redirect('profils')->with('error', "Désolé, votre adresse email ne peut pas être identifié!");
        }

        
    }

    public function updatePassword(Request $request)
    {
        //Validate password fields
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        ]);

        $user_id = auth()->user()->id;

        $user = User::findOrFail($user_id); //Get user specified by id

        if ((Hash::check(request('old_password'), Auth::user()->password)) == false) {

            return back()->with('error', 'Your old password is not correct! Please check!');

        } else if ((Hash::check(request('new_password'), Auth::user()->password)) == true) {

            return back()->with('error', 'Please enter a password which is not similar then current password.');

        } else {

            $user->password = $request->input('new_password');

            $user->save();

            return redirect('profils')->with('success', 'Password updated successfully.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
