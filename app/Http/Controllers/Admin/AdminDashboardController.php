<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function showDashboardPage()
    {
        return view('pages.admin-dashboard.dashboard');
    }
}
