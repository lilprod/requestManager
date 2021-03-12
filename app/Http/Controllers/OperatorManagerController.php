<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OperatorManagerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'operator']); //ressource middleware lets only users with a //specific permission permission to access these resources
    }
}
