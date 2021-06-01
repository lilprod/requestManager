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
        $this->middleware(['auth', 'isAdmin', 'partner', 'operator', 'ressource', 'chief']); //supAdmin middleware lets only users with a //specific permission permission to access these resources
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
            $this->validate($request, [
                'title' => 'required|max:120',
                'body' => 'required',
                'incident_date' => 'required',
            ],

            $messages = [
                'title.required' => 'Le Titre est un champ obligatoire.',
                'body.required' => 'Le Commentaire est un champ obligatoire.',
                'incident_date.required' => 'La Date de l\'incident est un champ obligatoire.',
            ]
        );

        $complaint = new Complaint();
        $complaint->title = $request->input('title');
        $complaint->description = $request->input('body');
        $complaint->incident_date = $request->input('incident_date');

        $partner = Partner::where('user_id', auth()->user()->id)->first();
        $complaint->operator_id = 1;
        $complaint->partner_id = $partner->id;
        $complaint->user_id = auth()->user()->id;

        if($request->input('type_complaint_id') == ''){
            $complaint->type_complaint_id = 6;
        }else{
            $complaint->type_complaint_id = $request->input('type_complaint_id');
        }

        //$complaint->username = auth()->user()->name.' '.auth()->user()->firstname;

        /*$historique = new Historique();
        $historique->action = 'Create';
        $historique->table = 'Complaint';
        $historique->user_id = auth()->user()->id;*/

        $complaint->save();

        //$historique->save();
        /*if($post->status == 1){
            return redirect()->route('admin.posts.index')
            ->with('success',
             'Offre publiée avec succès.');

        }else{
            return redirect()->route('doctor_pending_posts')
            ->with('success',
             'Post is pending.');
        }*/
        return redirect()->route('partner.partner_pending_complaints')
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

        $partner = Partner::where('user_id', auth()->user()->id)->first();

        $this->validate($request, [
                'title' => 'required|max:120',
                'body' => 'required',
                'incident_date' => 'required',
            ],

            $messages = [
                'title.required' => 'Le Titre est un champ obligatoire.',
                'body.required' => 'Le Commentaire est un champ obligatoire.',
                'incident_date.required' => 'La Date de l\'incident est un champ obligatoire.',
            ]
        );

        if($complaint->status == 0){

            $complaint->title = $request->input('title');
            $complaint->description = $request->input('body');
            $complaint->incident_date = $request->input('incident_date');
            //$complaint->status = $request->input('status');
            $complaint->user_id = auth()->user()->id;
            $complaint->operator_id = 1;
            $complaint->partner_id = $partner->id;

            if($request->input('type_complaint_id') == ''){
                $complaint->type_complaint_id = 6;
            }else{
                $complaint->type_complaint_id = $request->input('type_complaint_id');
            }

            //$complaint->username = auth()->user()->name.' '.auth()->user()->firstname;

            /*$historique = new Historique();
            $historique->action = 'Create';
            $historique->table = 'Complaint';
            $historique->user_id = auth()->user()->id;*/

            $complaint->save();

            return redirect()->route('partner.partner_pending_complaints')
                ->with('success',
                'Requête éditée avec succès.');

        }

            return redirect()->route('partner_archived_complaints')
                ->with('error',
                'Requête déjà traité.');
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

        return redirect()->route('partner.partner_pending_complaints')
            ->with('success',
             'Requête supprimée avec succès.');
    }
}
