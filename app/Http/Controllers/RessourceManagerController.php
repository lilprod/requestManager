<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Ressource;
use App\Models\Partner;
use App\Models\Operator;
use App\Models\User;
use Carbon\Carbon;

use Illuminate\Http\Request;

class RessourceManagerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'ressource', 'chief']); //ressource middleware lets only users with a //specific permission permission to access these resources
    }

    public function pendingComplaints()
    {
        $complaints = Complaint::where('status', 0)
                                ->get();

        return view('ressource.pending', compact('complaints'));
    }

    public function processedComplaints(){

        //$complaints = auth()->user()->myprocessedComplaints();

        $complaints = Complaint::where('status', 1)
                                ->where('approuved_by', auth()->user()->id)
                                ->get();

        return view('ressource.processed', compact('complaints'));
    }

    public function changeUserStatus(Request $request)
    {
        $ressource = Ressource::where('user_id', auth()->user()->id)->first();

        $complaint = Complaint::findOrFail($request->journee_id);

        $complaint->status = $request->status;

        $complaint->ressource_id = $ressource->id;

        $complaint->approuved_by = auth()->user()->id;

        $complaint->closing_date = Carbon::now();

        $complaint->save();
  
        return response()->json(['success'=>'Complaint status change successfully.']);
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

        $ressource = Ressource::where('user_id', auth()->user()->id)->first();

            $this->validate($request, [
                'title' => 'required|max:120',
                'body' => 'required',
                'incident_date' => 'nullable',
            ],

            $messages = [
                'required' => 'The :attribute field is required.',
            ]
        );

        $complaint->title = $request->input('title');
        $complaint->body = $request->input('body');
        $complaint->incident_date = $request->input('incident_date');
        $complaint->status = $request->input('status');
        $complaint->ressource_id = $ressource->id;
        $complaint->approuved_by = auth()->user()->id;
        $complaint->closing_date = Carbon::now();

        if($request->input('category_id') == ''){
            $complaint->type_complaint_id = 6;
        }else{
            $complaint->type_complaint_id = $request->input('category_id');
        }

        //$complaint->username = auth()->user()->name.' '.auth()->user()->firstname;

        /*$historique = new Historique();
        $historique->action = 'Create';
        $historique->table = 'Complaint';
        $historique->user_id = auth()->user()->id;*/

        $complaint->save();

        return redirect()->route('admin.complaints.index')
            ->with('success',
             'Requête éditée avec succès.');
    }
}
