<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\RentalController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Frontend\CarController as FrontendCarController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\RentalController as FrontendRentalController;
use Illuminate\Support\Facades\Route;;


Route::get("/", [PageController::class, "showHomepage"])->name("homepage");
Route::get("/about", [PageController::class, "aboutPage"])->name("about");
Route::get("/contact", [PageController::class, "contactPage"])->name("contact");
Route::get("/rentals", [PageController::class, "rentals"])->name("rentals");

Route::get('/cars/search', [FrontendCarController::class, 'search'])->name('cars.search');
Route::get('/cars/{id}', [FrontendCarController::class, 'show'])->name('cars.show');
Route::get('/cars/{id}/book', [FrontendCarController::class, 'book'])->name('cars.book');
Route::post('/cars/{id}/rent', [FrontendCarController::class, 'rent'])->name('cars.rent');
Route::get('/cars/{id}/checkout', [FrontendCarController::class, 'checkout'])->name('cars.checkout');
Route::post("/checkout", [FrontendRentalController::class, "store"])->name("rentals.store");


Route::as("user.")->controller(AuthController::class)->group(function () {
    Route::get("/sign-up", "showSignUpPage")->name("sign-up");
    Route::get("/sign-in", "showSignInPage")->name("sign-in");
});

Route::as("auth.")->controller(AuthController::class)->group(function () {
    Route::post("/sign-up", "signUp")->name("sign-up");
    Route::post("/sign-in", "signIn")->name("sign-in");
    Route::get("/sign-out", "signOut")->name("sign-out");
});

Route::as("admin.")->prefix("admin")->middleware("adminAuthCheck")->group(function () {

    Route::get("/dashboard", [AdminDashboardController::class, "showDashboardPage"])->name("dashboard");

    Route::get("/cars", [CarController::class, "index"])->name("cars.index");
    Route::get("/cars/all", [CarController::class, "getAllCars"])->name("cars.all");
    Route::get("/cars/{id}", [CarController::class, "getSingleCar"])->name("cars.single");
    Route::post("/cars", [CarController::class, "store"])->name("cars.store");
    Route::post("/cars/{id}", [CarController::class, "updateCar"])->name("cars.update");
    Route::delete("/cars/{id}", [CarController::class, "destroy"])->name("cars.destroy");

    Route::get("/customers", [CustomerController::class, "index"])->name("customers.index");
    Route::get("/customers/all", [CustomerController::class, "getAllCustomers"])->name("customers.all");
    Route::get("/customers/{id}", [CustomerController::class, "getSingleCustomer"])->name("customers.single");
    Route::delete("/customers/{id}", [CustomerController::class, "destroy"])->name("customers.destroy");

    Route::get("/rentals", [RentalController::class, "index"])->name("rentals.index");
    Route::get("/rentals/all", [RentalController::class, "getAllRentals"])->name("rentals.all");
    Route::delete("/rentals/{id}", [RentalController::class, "destroy"])->name("rentals.destroy");
});


Route::as("customer.")->middleware("customerAuthCheck")->group(function () {
    Route::get("/hisory", [PageController::class, "history"])->name("history");
});
