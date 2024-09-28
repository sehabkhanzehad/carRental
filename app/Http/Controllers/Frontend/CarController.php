<?php

namespace App\Http\Controllers\Frontend;

use App\Helper\JwtToken;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;

class CarController extends Controller
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




    public function search(Request $request)
    {
        $pickDate = $request->input('pick_date');
        $dropDate = $request->input('drop_date');
        $cars = Car::where('availability', true)->get();

        $customer = $this->check($request);

        return view('pages.homepage.search', compact('cars', 'customer'));
    }

    public function show(string $id)
    {
        $car = Car::find($id);
        $relatedCars = Car::where('brand', $car->brand)->where('id', '!=', $car->id)->get();
        return view('pages.homepage.car-details', [
            'car' => $car,
            'relatedCars' => $relatedCars,
            'customer' => $this->check(request()),
        ]);
    }

    public function book(string $id)
    {
        $car = Car::find($id);
        return view('pages.homepage.book', [
            'car' => $car,
            'customer' => $this->check(request()),
        ]);
    }

    public function rent(Request $request, string $id)
    {
        try {
            // $data = $request->all();
            $data = [
                'pick_date' => $request->input('pick_date'),
                'drop_date' => $request->input('drop_date'),
                'total_cost' => $request->input('total_cost'),
                'car_id' => $request->input('car_id'),
            ];


            // set cookier with this data
            // ->cookie('signInToken', $token, 60 * 24)
            return response()->json([
                'status' => 'success',
                'message' => 'Car booked successfully.',
                'url' => route('cars.checkout', $id),
            ], 200)->cookie('data', json_encode($data), 60 * 24);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'failed',
                'message' => "Something went wrong, please try again.",
                'error' => $th->getMessage(),
            ], 400);
        }
    }

    public function checkout(Request $request, string $id)
    {
        $car = Car::find($id);
        $data = json_decode($request->cookie('data'));

        $customer = $this->check(request());
        return view('pages.homepage.checkout', compact('car', 'data', 'customer'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
