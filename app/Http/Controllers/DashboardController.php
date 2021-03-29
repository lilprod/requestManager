<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ressource;
use App\Models\Operator;
use App\Models\Partner;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pendingcomplaints = 0;

        $archivedcomplaints = 0;

        $admins = 0;

        $partners = 0;

        $ressources = 0;

        $operators = 0;

        if(auth()->user()->role_id == 2){

            $pendingcomplaints = auth()->user()->partnerPendingComplaints()->count();

            $archivedcomplaints = auth()->user()->partnerArchivedComplaints()->count();

            return view('dashboard', compact('pendingcomplaints', 'archivedcomplaints', 'admins', 'partners', 'ressources', 'operators'));
        }

        if(auth()->user()->role_id == 1){

            $admins = User::where('role_id', 1)->get()->count();

            $partners = Partner::all()->count();

            $ressources = Ressource::all()->count();

            $operators = Operator::all()->count();

            return view('dashboard', compact('pendingcomplaints', 'archivedcomplaints', 'admins', 'partners', 'ressources', 'operators'));

        }

        return view('dashboard', compact('pendingcomplaints', 'archivedcomplaints', 'admins', 'partners', 'ressources', 'operators'));
    }
}
