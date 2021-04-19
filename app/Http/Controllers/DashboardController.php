<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ressource;
use App\Models\Operator;
use App\Models\Partner;
use App\Models\User;
use App\Models\Complaint;
use Carbon\Carbon;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

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

        $todaypendingcomplaints = 0;

        $todayproceedcomplaints = 0;

        $archivedcomplaints = 0;

        $admins = 0;

        $partners = 0;

        $ressources = 0;

        $operators = 0;

        $chart_options = [
            'chart_title' => 'Requêtes par mois',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Complaint',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
        ];

        $chart1 = new LaravelChart($chart_options);

        if(auth()->user()->role_id == 2){

            $pendingcomplaints = auth()->user()->partnerPendingComplaints()->count();

            $archivedcomplaints = auth()->user()->partnerArchivedComplaints()->count();

            return view('dashboard', compact('chart1','todaypendingcomplaints', 'todayproceedcomplaints', 'pendingcomplaints', 'archivedcomplaints', 'admins', 'partners', 'ressources', 'operators'));
        }

        if(auth()->user()->role_id == 1){

            $admins = User::where('role_id', 1)->get()->count();

            $partners = Partner::all()->count();

            $ressources = Ressource::all()->count();

            $operators = Operator::all()->count();

            return view('dashboard', compact('chart1', 'todaypendingcomplaints', 'todayproceedcomplaints', 'pendingcomplaints', 'archivedcomplaints', 'admins', 'partners', 'ressources', 'operators'));

        }

        if(auth()->user()->role_id == 4){

            $today = Carbon::now()->toDateString();

            $pendingcomplaints = Complaint::where('status', 0)->get()->count();

            $archivedcomplaints = Complaint::where('status', 1)->get()->count();

            $todaypendingcomplaints = Complaint::where('created_at', '=', $today)
                                                ->where('status', 0)
                                                ->get()->count();

            $todayproceedcomplaints = Complaint::where('closing_date', '=', $today)
                                                ->where('status', 1)
                                                ->get()->count();

            return view('dashboard', compact('chart1', 'todaypendingcomplaints', 'todayproceedcomplaints', 'pendingcomplaints', 'archivedcomplaints', 'admins', 'partners', 'ressources', 'operators'));

        }

        return view('dashboard', compact('chart1', 'todaypendingcomplaints', 'todayproceedcomplaints', 'pendingcomplaints', 'archivedcomplaints', 'admins', 'partners', 'ressources', 'operators'));
    }
}
