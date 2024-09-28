<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\Rent;
use App\Models\Rental;
use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Mail;

class RentalController extends Controller
{
    public $adminEmail = "sehabkhanzehad@yahoo.com";
    public function store()
    {
       try {
        $data = json_decode(request()->cookie('data'));
        $customer = CarController::check(request());
        $car = Car::find($data->car_id);

        $isAvailable = Rental::where('car_id', $data->car_id)
            ->where(function ($query) use ($data) {
                $query->whereBetween('start_date', [$data->pick_date, $data->drop_date])
                    ->orWhereBetween('end_date', [$data->pick_date, $data->drop_date]);
            })->doesntExist();

        if (!$isAvailable) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Car is not available for the selected dates.',
            ], 200)->cookie('data', null, -1);
        }

        Mail::to($customer->email)->send(new Rent($data, $customer, $car));
        Mail::to($this->adminEmail)->send(new Rent($data, $customer, $car));

       Rental::create([
            'user_id' => $customer->id,
            'car_id' => $data->car_id,
            'start_date' => $data->pick_date,
            'end_date' => $data->drop_date,
            'total_cost' => $data->total_cost,
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Booking confirmed. Check your email for more details.',
        ], 200)->cookie('data', null, -1);
       } catch (\Throwable $th) {
        return response()->json([
            'status' => 'failed',
            'message' => "Something went wrong, please try again.",
            'error' => $th->getMessage(),
        ], 400);
       }
    }
}
