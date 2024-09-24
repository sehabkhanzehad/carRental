<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin-dashboard.management.cars');
    }

    public function getAllCars()
    {
        try {
            $cars = Car::all();
        return response()->json([
            "status" => "success",
            "data" => $cars,
        ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => "failed",
                "message" => "Something went wrong, Please try again.",
            ], 500);
        }
    }

    public function getSingleCar($id)
    {
        try {
            $car = Car::where('id', $id)->first();
            return response()->json([
                "status" => "success",
                "car" => $car,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => "failed",
                "message" => "Something went wrong, Please try again.",
            ], 500);
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store car details.
     */
    public function store(Request $request)
    {
        try {
            $carImage = $request->file('image');
            $carImageName = uniqid() . "_car" . "." . $carImage->getClientOriginalExtension();
            $carImage->move(public_path('uploads/cars/'), $carImageName);
            $carImagePath = asset("uploads/cars/" . $carImageName);

            $car =  Car::create([
                'name' => $request->input('name'),
                'brand' => $request->input('brand'),
                'model' => $request->input('model'),
                'year' => $request->input('year'),
                'car_type' => $request->input('car_type'),
                'daily_rent_price' => $request->input('daily_rent_price'),
                'image' => $carImagePath,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Car added successfully.',
                'data' => $car,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Something went wrong. Please try again.',
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
     * Update car details.
     */
    public function update(Request $request, string $id)
    {
        try {
            if ($request->hasFile('image')) {
                // Delete Old Image
                $oldImage = Car::where('id', $id)->first()->image;
                unlink(public_path($oldImage));

                // Upload New Image
                $carImage = $request->file('image');

                $carImageName = uniqid() . "_car" . "." . $carImage->getClientOriginalExtension();
                $carImage->move(public_path('uploads/cars/'), $carImageName);
                $carImagePath = asset("uploads/cars/" . $carImageName);

                $car = Car::where('id', $id)->update([
                    'name' => $request->input('name'),
                    'brand' => $request->input('brand'),
                    'model' => $request->input('model'),
                    'year' => $request->input('year'),
                    'car_type' => $request->input('car_type'),
                    'daily_rent_price' => $request->input('daily_rent_price'),
                    'image' => $carImagePath,
                ]);

                return response()->json([
                    'status' => 'success',
                    'message' => 'Car updated successfully.',
                    'data' => $car,
                ], 200);
            } else {
                $car = Car::where('id', $id)->update([
                    'name' => $request->input('name'),
                    'brand' => $request->input('brand'),
                    'model' => $request->input('model'),
                    'year' => $request->input('year'),
                    'car_type' => $request->input('car_type'),
                    'daily_rent_price' => $request->input('daily_rent_price'),
                ]);

                return response()->json([
                    'status' => 'success',
                    'message' => 'Car updated successfully.',
                    'data' => $car,
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Something went wrong. Please try again.',
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove car details.
     */
    public function destroy(string $id)
    {
        try {
            // $id = $request->input('id');
            $car = Car::where('id', $id)->first();
            $carImage = $car->image;
            unlink(public_path($carImage));
            $car->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Car deleted successfully.',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'failed',
                'message' => "Something went wrong, Please try again.",
            ], 500);
        }
    }
}
