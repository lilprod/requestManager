<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PartnerManagerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'partner']); //partner middleware lets only users with a //specific permission permission to access these resources
    }

    public function pendingComplaints()
    {
        $complaints = auth()->user()->partnerPendingComplaints();

        return view('partner.pending', compact('complaints'));
    }

    public function archivedComplaints()
    {
        $complaints = auth()->user()->partnerArchivedComplaints();

        return view('partner.archive', compact('complaints'));
    }
}
