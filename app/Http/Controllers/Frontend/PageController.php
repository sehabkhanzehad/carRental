<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\JwtToken;
use App\Models\Car;
use App\Models\Rental;
use App\Models\User;

class PageController extends Controller
{
    public static function check(Request $request){
        $token = $request->cookie('userSignInToken');
        if ($token) {
            $result = JwtToken::decodeToken($token);
            $customerId = $result->id;
            $customerEmail = $result->email;
            $customer = User::where('id', $customerId)->where('email', $customerEmail)->where("role", "customer")->first();

            return $customer;
        }
    }

    public function showHomepage(Request $request)
    {
        $token = $request->cookie('userSignInToken');
        if ($token) {
            $result = JwtToken::decodeToken($token);
            $customerId = $result->id;
            $customerEmail = $result->email;
            $customer = User::where('id', $customerId)->where('email', $customerEmail)->where("role", "customer")->first();

            $cars = Car::where('availability', true)->get();
            return view('pages.homepage.index', compact('cars', 'customer'));
        }
        $cars = Car::where('availability', true)->get();

        return view('pages.homepage.index', compact('cars'));
    }
    public function aboutPage(Request $request)
    {
        return view('pages.homepage.about', [
            'customer' => $this->check(request()),
        ]);
    }

    public function contactPage(Request $request)
    {
        return view('pages.homepage.contact', [
            'customer' => $this->check(request()),
        ]);
    }

    public function rentals(Request $request)
    {
        $cars = Car::where('availability', true)->get();
        return view('pages.homepage.cars', [
            'cars' => $cars,
            'customer' => $this->check(request()),
        ]);
    }
    public function history(Request $request)
    {
        $userId = $request->header("customerId");

        $rentals = Rental::with("car")->where("user_id", $userId)->get();
        return view('pages.homepage.history',[
            'rentals' => $rentals,
            'customer' => $this->check(request()),
        ]);
    }

}
