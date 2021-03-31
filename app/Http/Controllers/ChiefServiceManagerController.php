<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Models\Ressource;
use App\Models\Partner;
use App\Models\Operator;
use App\Models\User;
use Carbon\Carbon;

class ChiefServiceManagerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin','chief']); //supAdmin middleware lets only users with a //specific permission permission to access these resources
    }

    public function pendingComplaints()
    {
        $complaints = Complaint::where('status', 0)
                                ->get();

        return view('ressource.pending', compact('complaints'));
    }

    public function processedComplaints(){

        $complaints = Complaint::where('status', 1)
                                ->get();

        return view('ressource.processed', compact('complaints'));
    }
}
