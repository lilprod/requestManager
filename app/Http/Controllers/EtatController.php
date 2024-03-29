<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Ressource;
use App\Models\TypeComplaint;
use App\Models\Complaint;
use App\Models\Partner;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EtatController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'ressource', 'chief', 'isAdmin']); //ressource middleware lets only users with a //specific permission permission to access these resources
    }

    public function recap()
    {
        $complaints = [];

        return view('stats.recap', compact('complaints'));

    }

    public function chiefRecap()
    {
        $complaints = [];

        //$agents = Ressource::all();
        $agents = Ressource::where('user_id', '!=', auth()->user()->id)
                            ->get();

        return view('stats.chief_recap', compact('complaints', 'agents'));

    }

    public function postChiefRecap(Request $request)
    {
        $this->validate($request, [
                'ressource_id' => 'required',
                'from_date' => 'nullable',
                'to_date' => 'nullable',
            ],

            $messages = [
                'ressource_id.required' => 'La Ressource est un champ obliagatoire.',
                'from_date.required' => 'La Date de début est un champ obliagatoire.',
                'to_date.required' => 'La Date de fin est un champ obliagatoire.',
            ]
        );

        $from_date = Carbon::parse($request->input('from_date'));
        $to_date = Carbon::parse($request->input('to_date'));

        $complaints = Complaint::where('ressource_id', $request->ressource_id)
                                ->whereDate('closing_date', '>=' , $from_date)
                                ->whereDate('closing_date', '<=' , $to_date)
                                ->where('status', 1)
                                ->get();

        //$agents = Ressource::all();

        $agents = Ressource::where('user_id', '!=', auth()->user()->id)
                            ->get();

        return view('stats.chief_recap', compact('complaints', 'agents'));

    }

    public function postRecap(Request $request)
    {
        $this->validate($request, [
            'periode' => 'required',
            ],

            $messages = [
                'periode.required' => 'La Période est un champ obliagatoire.',
            ]
        );

        $complaints = Complaint::all();

        return view('stats.recap', compact('complaints'));

    }

    public function partner()
    {
        $partners = Partner::all();

        $complaints = [];

        return view('stats.complaint_partner', compact('partners', 'complaints'));
    }

    public function type()
    {
        $types = TypeComplaint::all();

        $complaints = [];

        return view('stats.complaint_type', compact('types', 'complaints'));
    }

    public function postPartner(Request $request)
    {
        $this->validate($request, [
            'partner_id' => 'required',
            ],

            $messages = [
                'required' => 'The :attribute est un champ obliagatoire.',
            ]
        );

        $complaints = Complaint::where('partner_id', $request->partner_id)
                            ->get();

        $partners = Partner::all();

        return view('stats.complaint_partner', compact('partners', 'complaints'));

    }

    public function postType(Request $request)
    {
        $this->validate($request, [
            'type_complaint_id' => 'required',
            ],

            $messages = [
                'required' => 'The :attribute est un champ obliagatoire.',
            ]
        );

        $complaints = Complaint::where('type_complaint_id', $request->type_complaint_id)
                                ->get();

        $types = TypeComplaint::all();

        return view('stats.complaint_type', compact('types', 'complaints'));
    }
}
