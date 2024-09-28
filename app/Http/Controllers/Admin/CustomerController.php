<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return view("pages.admin-dashboard.management.customers");
    }

    public function getAllCustomers()
    {
        try {
            $customers = User::where('role', 'customer')->get();
            return response()->json([
                "status" => "success",
                "data" => $customers,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => "failed",
                "message" => "Something went wrong, Please try again.",
            ], 500);
        }
    }

    public function update(Request $request, string $id) {}


    public function destroy(string $id)
    {
        try {
            $customer = User::where("role", "customer")->where('id', $id)->first();
            $haveRental = Rental::where("user_id", $customer->id)->first();
            if ($haveRental != null) {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Customer has rental, Please cancel the rental first.',
                ], 200);
            } else {
                $customer->delete();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Customer deleted successfully.',
                ], 200);
            }

        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'failed',
                'message' => "Something went wrong, Please try again.",
            ], 500);
        }
    }
}
