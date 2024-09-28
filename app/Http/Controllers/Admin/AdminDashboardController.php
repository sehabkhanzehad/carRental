<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Log\Logger;

class AdminDashboardController extends Controller
{
    public function showDashboardPage()
    {
        $users = User::where("role", "customer")->count();
        $cars = Car::count();
        $availableCars = Car::where("availability", true)->count();
        $rentals = Rental::count();
        $totalIncome = Rental::sum("total_cost");


        return view('pages.admin-dashboard.dashboard', [
            "users" => $users,
            "cars" => $cars,
            "rentals" => $rentals,
            "totalIncome" => $totalIncome,
            "availableCars" => $availableCars
        ]);
    }
}
