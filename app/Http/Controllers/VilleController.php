<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ville;
use App\Models\Region;

class VilleController extends Controller
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
        $villes = Ville::all(); //Get all villes

        return view('villes.index')->with('villes', $villes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Region::all(); //Get all regions

        return view('villes.create', compact('regions'));
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
            //'region_id' => 'required',
            'description' => 'nullable',
            ],

            $messages = [
                'title.required' => 'Le Titre est un champ obligatoire.',
            ]
        );

        $ville = new Ville(); 

        $ville->title = $request->input('title');
        //$ville->region_id = $request->input('region_id');
        $ville->description = $request->input('description');

        $ville->save();

        return redirect()->route('admin.villes.index')
            ->with('success',
             'Ville ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ville = Ville::findOrFail($id);

        return view('regions.show', compact('ville'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ville = Ville::findOrFail($id);

        $regions = Region::all(); //Get all regions

        return view('regions.edit', compact('ville', 'regions'));
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
        $ville = Ville::findOrFail($id);

        $this->validate($request, [
            'title' => 'required|max:120',
            //'region_id' => 'required',
            'description' => 'nullable',
            ],

            $messages = [
                'title.required' => 'Le Titre est un champ obligatoire.',
            ]
        );

        $ville->title = $request->input('title');
        //$ville->region_id = $request->input('region_id');
        $ville->description = $request->input('description');

        $ville->save();

        return redirect()->route('admin.villes.index')
            ->with('success',
             'Ville éditée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ville = Ville::findOrFail($id);

        $ville->delete();

        return redirect()->route('admin.villes.index')
            ->with('success',
             'Ville supprimée avec succès.');
    }
}
