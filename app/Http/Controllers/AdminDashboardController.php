<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function __invoke()
    {
        if(Auth::check()){
            return view('pages.admin-dashboard');
        }
    }
}
