<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Customer\CustomerDashboardController;
use App\Http\Controllers\Homepage\HomepageController;
use Illuminate\Support\Facades\Route;;


Route::get("/", [HomepageController::class, "showHomepage"])->name("homepage");

Route::as("user.")->controller(AuthController::class)->group(function () {
    Route::get("/sign-up", "showSignUpPage")->name("sign-up");
    Route::get("/sign-in", "showSignInPage")->name("sign-in");
});

Route::as("auth.")->controller(AuthController::class)->group(function () {
    Route::post("/sign-up", "signUp")->name("sign-up");
    Route::post("/sign-in", "signIn")->name("sign-in");
    Route::get("/sign-out", "signOut")->name("sign-out");
});

Route::as("admin.")->prefix("admin")->controller(AdminDashboardController::class)->middleware("adminAuthCheck")->group(function () {
    Route::get("/dashboard", "showDashboardPage")->name("dashboard");
    Route::get("/cars/all", [CarController::class, "getAllCars"])->name("cars.all");
    Route::resource("/cars", CarController::class);

    // Route::get("/cars/{id}", [CarController::class, "getSingleCar"])->name("cars.single");
});

Route::as("customer.")->prefix("customer")->controller(CustomerDashboardController::class)->middleware("customerAuthCheck")->group(function () {
    Route::get("/dashboard", "showDashboardPage")->name("dashboard");
});

