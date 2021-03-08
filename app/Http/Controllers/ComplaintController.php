<?php

namespace App\Http\Controllers;

use App\Models\TypeComplaint;
use App\Models\Complaint;
use App\Models\User;
use App\Models\Partner;
use App\Models\Operator;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin','partner','operator', 'ressource']); //supAdmin middleware lets only users with a //specific permission permission to access these resources
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complaints = Complaint::all(); //Get all complaints

        return view('complaints.index')->with('complaints', $complaints);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = TypeComplaint::all(); //Get all types

        return view('complaints.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect()->route('admin.complaints.index')
            ->with('success',
             'Requête enregistrée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $types = TypeComplaint::all(); //Get all types
        
        $complaint = Complaint::findOrFail($id);

        return view('complaints.show', compact('types', 'complaint'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types = TypeComplaint::all(); //Get all types

        $complaint = Complaint::findOrFail($id);

        return view('complaints.edit', compact('types', 'complaint'));
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
        $complaint = Complaint::findOrFail($id);

        return redirect()->route('admin.complaints.index')
            ->with('success',
             'Requête éditée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $complaint = Complaint::findOrFail($id);

        $complaint->delete();

        return redirect()->route('admin.complaints.index')
            ->with('success',
             'Requête supprimée avec succès.');
    }
}
