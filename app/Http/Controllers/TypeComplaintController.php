<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

use App\Models\TypeComplaint;


class TypeComplaintController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin']); //supAdmin middleware lets only users with a //specific permission permission to access these resources
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = TypeComplaint::all(); //Get all types

        return view('typecomplaints.index')->with('types', $types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('typecomplaints.create');
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
            'title' => 'required|max:120',
            'slug'  => 'required|min:3|max:255|unique:type_complaints',
            'description' => 'nullable',
            ],

            $messages = [
                'required' => 'The :attribute field is required.',
            ]
        );

        $type = new TypeComplaint(); 

        $type->title = $request->input('title');
        $type->description = $request->input('description');

        $type->save();

        return redirect()->route('admin.typecomplaints.index')
            ->with('success',
             'Type Requête ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type = TypeComplaint::findOrFail($id);

        return view('admin.typecomplaints.edit', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = TypeComplaint::findOrFail($id);

        return view('admin.typecomplaints.edit', compact('type'));
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
        $type = TypeComplaint::findOrFail($id);

        $this->validate($request, [
            'title' => 'required|max:120',
            'slug'  => 'required|min:3|max:255|unique:type_complaints,id,' . $type->slug,
            'description' => 'nullable',
            ],

            $messages = [
                'required' => 'The :attribute field is required.',
            ]
        );

        $type->title = $request->input('title');
        $type->description = $request->input('description');

        $type->save();

        return redirect()->route('admin.typecomplaints.index')
            ->with('success',
             'Type Requête éditée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = TypeComplaint::findOrFail($id);

        $type->delete();

        return redirect()->route('admin.typecomplaints.index')
            ->with('success',
             'Type Requête supprimée avec succès.');
    }
}
