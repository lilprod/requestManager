<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Partner;
//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin', 'operator']); //supAdmin middleware lets only users with a //specific permission permission to access these resources
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get all users and pass it to the view
        $institutions = Partner::all();

        $roles = Role::whereNotIn('id', array(1,3,4))->get();

        return view('partners.index', ['roles' => $roles, 'institutions' => $institutions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::whereNotIn('id', array(1,3,4))->get();

        return view('partners.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate these fields
        $this->validate($request, [
            'structure_id' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'required|string|min:8',
            'address' => 'required',
            'city' => 'required',
            'nif' => 'required',
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
            'email' => $request['email'],
            'password' => 'password',
            'phone_number' => $request['phone_number'],
            'address' => $request['address'],
            'city' => $request['city'],
            'postal_code' => $request['postal_code'],
            'role_id' => 2,
            'profile_picture' => $fileNameToStore,
        ]);

        $user->assignRole('Partner');

        $institution = new Partner();

        $institution->name = $request['name'];

        $institution->nif = $request['nif'];

        //$institution->username = $request['username'];

        $institution->email = $request['email'];

        $institution->phone_number = $request['phone_number'];

        $institution->address = $request['address'];

        $institution->city = $request['city'];

        $institution->postal_code = $request['postal_code'];

        $institution->profile_picture = $fileNameToStore;

        $institution->user_id = $user->id;

        $institution->save();

        return redirect()->route('admin.partners.index')
            ->with('success', 'Partenaire ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        ///Find a user with a given id to edit
        $institution = Partner::findOrFail($id);

        $roles = Role::whereNotIn('id', array(1,3,4))->get();

        return view('admin.partners.show', ['roles' => $roles, 'institution' => $institution]);
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        ///Find a user with a given id to edit
        $institution = Partner::findOrFail($id);

        $roles = Role::whereNotIn('id', array(1,3,4))->get();

        return view('admin.partners.edit', ['roles' => $roles, 'institution' => $institution]);
    
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
        ///Find a user with a given id to edit
        $institution = Partner::findOrFail($id);

        //Validate these fields
        $this->validate($request, [
            'structure_id' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'nullable|string|min:8',
            'address' => 'required',
            'city' => 'required',
            'nif' => 'required',
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

        $institution->nif = $request['nif'];

        $institution->name = $request['name'];

        //$institution->username = $request['username'];

        $institution->email = $request['email'];

        $institution->phone_number = $request['phone_number'];

        $institution->address = $request['address'];

        $institution->city = $request['city'];

        $institution->postal_code = $request['postal_code'];

        if ($request->hasfile('profile_picture')) {
            $institution->profile_picture = $fileNameToStore;
        }

        $institution->save();

        $user = User::where('id', $institution->user_id)->first();

        $user->name = $request['name'];

        $user->email = $request['email'];

        $user->city = $request['city'];

        $user->address = $request['address'];

        $user->postal_code = $request['postal_code'];

        $user->phone_number = $request['phone_number'];

        if ($request->hasfile('profile_picture')) {
            $user->profile_picture = $fileNameToStore;
        }

        $user->save();

        return redirect()->route('admin.partners.index')
            ->with('success', 'Partenaire édité avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ///Find a user with a given id to edit
        $institution = Partner::findOrFail($id);

        $user = User::where('id', $institution->user_id)->first();

        if ($user->profile_picture != 'avatar.jpg') {
            Storage::delete('public/profile_images/'.$user->profile_picture);
        }
        
        $user->delete();

        $institution->delete();

        return redirect()->route('admin.partners.index')
            ->with('success', 'Partenaire supprimé avec succès.');
    }
}
