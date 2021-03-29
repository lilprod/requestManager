<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChiefServiceManagerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin','chief']); //supAdmin middleware lets only users with a //specific permission permission to access these resources
    }
}
