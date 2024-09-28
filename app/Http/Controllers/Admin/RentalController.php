<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rental;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin-dashboard.management.rentals');
    }

    public function getAllRentals()
    {
        $rentals = Rental::with('car', 'user')->orderBy('start_date', 'asc')->get();
        return response()->json([
            "data" => $rentals
        ]);
    }

    public function destroy(string $id)
    {
        try {
            $rental = Rental::find($id);
            $rental->delete();
            return response()->json([
                "status" => "success",
                "message" => "Rental cancelled successfully"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => "failed",
                "message" => "Failed to cancel rental",
                "error" => $e->getMessage()
            ]);
        }
    }
}
