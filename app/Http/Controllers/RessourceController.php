<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Ressource;
//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Storage;

class RessourceController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin', 'chief', 'operator']); //supAdmin middleware lets only users with a //specific permission permission to access these resources
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get all users and pass it to the view
        $staffs = Ressource::all();

        $roles = Role::whereNotIn('id', array(1,2,3))->get();

        return view('ressources.index', ['roles' => $roles, 'staffs' => $staffs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::whereNotIn('id', array(1,2,3))->get();

        return view('ressources.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'required|string|min:8',
            'birth_date' => 'required',
            'gender' => 'required',
            'address' => 'required',
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
            $fileNameToStore = 'avatar.jpg';
        }

        $user = User::create([
            'name' => $request['name'],
            'firstname' => $request['firstname'],
            'email' => $request['email'],
            'password' => 'password',
            'phone_number' => $request['phone_number'],
            'gender' => $request['gender'],
            'address' => $request['address'],
            'city' => $request['city'],
            'postal_code' => $request['postal_code'],
            'birth_date' => $request['birth_date'],
            'role_id' => 4,
            'profile_picture' => $fileNameToStore,
        ]);

        //$user->assignRole('Ressource');

        $roles = $request['roles']; //Retrieving the roles field
        //Checking if a role was selected
        if (isset($roles)) {
            foreach ($roles as $role) {
                $role_r = Role::where('id', '=', $role)->firstOrFail();
                $user->assignRole($role_r); //Assigning role to user
            }
        }

        $staff = new Ressource();

        $staff->name = $request['name'];

        $staff->firstname = $request['firstname'];

        //$staff->username = $request['username'];

        $staff->gender = $request['gender'];

        $staff->birth_date = $request['birth_date'];

        $staff->email = $request['email'];

        $staff->phone_number = $request['phone_number'];

        $staff->address = $request['address'];

        $staff->city = $request['city'];

        $staff->user_id = $user->id;

        $staff->postal_code = $request['postal_code'];
 
        $staff->profile_picture = $fileNameToStore;

        $staff->save();

        return redirect()->route('admin.ressources.index')
        ->with('success', 'Personnel ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $staff = Ressource::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff = Ressource::findOrFail($id);

        $user = User::where('id', $staff->user_id)->first();

        $roles = Role::whereNotIn('id', array(1,2,3))->get();

        return view('ressources.edit', ['roles' => $roles, 'staff' => $staff, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $staff = Ressource::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$staff->user_id,
            'phone_number' => 'nullable|string|min:8',
            'birth_date' => 'required',
            'gender' => 'required',
            'address' => 'required',
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
            $fileNameToStore = 'avatar.jpg';
        }

        $staff->name = $request['name'];

        $staff->firstname = $request['firstname'];

        //$staff->username = $request['username'];

        $staff->gender = $request['gender'];

        $staff->birth_date = $request['birth_date'];

        $staff->email = $request['email'];

        if($request->phone_number != ''){
            $staff->phone_number = $request['phone_number'];
        }

        $staff->address = $request['address'];

        $staff->city = $request['city'];

        $staff->postal_code = $request['postal_code'];

        $staff->save();

        $user = User::where('id', $staff->user_id)->first();

        $user->name = $request['name'];

        $user->firstname = $request['firstname'];

        $user->email = $request['email'];

        $user->city = $request['city'];

        $user->address = $request['address'];

        $user->postal_code = $request['postal_code'];

        if($request->phone_number != ''){
            $user->phone_number = $request['phone_number'];
        }
        
        if ($request->hasfile('profile_picture')) {
            $user->profile_picture = $fileNameToStore;
        }

        $user->save();

        $roles = $request['roles']; //Retreive all roles

        if (isset($roles)) {
            $user->roles()->sync($roles);  //If one or more role is selected associate user to roles
        } else {
            $user->roles()->detach(); //If no role is selected remove exisiting role associated to a user
        }

        return redirect()->route('admin.ressources.index')
            ->with('success', 'Personnel édité avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff = Ressource::findOrFail($id);

        $user = User::where('id', $staff->user_id)->first();

        if ($user->profile_picture != 'avatar.jpg') {
            Storage::delete('public/profile_images/'.$user->profile_picture);
        }

        $user->delete();

        $staff->delete();

        return redirect()->route('admin.ressources.index')
            ->with('success', 'Personnel supprimé avec succès.');
    }
}
