<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerDashboardController extends Controller
{
    public function showDashboardPage()
    {
        return view('pages.customer.dashboard');
    }
}
