<?php

namespace App\Http\Controllers\Auth;

use App\Helper\JwtToken;
use App\Mail\OTP;
use App\Models\User;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class AuthController extends Controller
{
    // Pages
    public function showSignUpPage(): View
    {
        return view('pages.auth.sign-up');
    }

    public function showSignInPage(): View
    {
        return view('pages.auth.sign-in');
    }

    // Methods
    public function signUp(Request $request)
    {
        try {
            // hash password
            $request['password'] = Hash::make($request->password);

            User::create($request->all());
            return response()->json([
                'status' => 'success',
                'url' => route('user.sign-in'),
                'message' => 'Sign up successfully.'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Something went wrong. Please try again.',
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    // public function otpSend(Request $request)
    // {
    //     try {
    //         $userEmail = $request->input('email');
    //         $check = User::where('email', $userEmail)->first();

    //         if ($check) {
    //             $otp = rand(100000, 999999);
    //             // OTP save to user table
    //             $check->update([
    //                 'otp' => $otp,
    //             ]);

    //             // OTP send to user email
    //             Mail::to($userEmail)->send(new OTP($otp));

    //             return response()->json([
    //                 'status' => 'success',
    //                 'url' => route('user.otp-verify'),
    //                 'message' => 'OTP sent successfully.',
    //             ], 200)->cookie('userEmail', $userEmail, 5);
    //         } else {
    //             return response()->json([
    //                 'status' => 'failed',
    //                 'message' => 'User not found.'
    //             ], 200);
    //         }
    //     } catch (\Throwable $th) {
    //         return response()->json([
    //             'status' => 'failed',
    //             'message' => 'Something went wrong. Please try again.',
    //             'error' => $th->getMessage(),
    //         ], 500);
    //     }
    // }








































    // public function signIn(Request $request)
    // {

    //     $user = User::where('email', $request->email)->where('password', $request->password)->first();

    //     if ($user) {
    //         // Issue Token for 1 hour
    //         $token = JWTToken::generateToken($request->input('email'), $user->id, 60 * 60);


    //         return response()->json([
    //             'status' => 'success',
    //             'url' => route('dashboard'),
    //             'message' => 'Login Successful',
    //             // 'token' => $token
    //         ], 200)->cookie('logInToken', $token, 60 * 1); // set cookie for 1 hour
    //     } else {
    //         return response()->json([
    //             'status' => 'failed',
    //             'message' => 'Invalid Email or Password'
    //         ], 200);
    //     }
    // }








    // public function resetPassword(Request $request)
    // {
    //     $email = $request->header("email");
    //     // $id = $request->attributes->get('id');


    //     // $user = User::where('email', $email)->where('id', $id)->first();
    //     $user = User::where('email', $email)->first();

    //     try {
    //         // if ($user) {

    //         $user->update([
    //             'password' => $request->password
    //         ]);
    //         return response()->json([
    //             'status' => 'success',
    //             'url' => route('user.login'),
    //             'message' => 'Password reset successfully.',
    //         ]);

    //         // } else {
    //         //     return response()->json([
    //         //         'status' => 'failed',
    //         //         'message' => 'User not found.'
    //         //     ], 200);
    //         // }

    //     } catch (\Throwable $th) {
    //         return response()->json([
    //             'status' => 'failed',
    //             'message' => 'Something went wrong. Please try again.',
    //             // 'error' => $th->getMessage(),
    //         ], 500);
    //     }
    // }

    // public function userLogout(Request $request)
    // {
    //     return redirect(route('user.login'))->cookie('logInToken', null, -1);
    // }


    public function signIn(Request $request)
    {
        // try {
        $userEmail = $request->input('email');
        $userPassword = $request->input('password');

        $user = User::where('email', $userEmail)->first();

        if (!$user) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Invalid Email or Password.'
            ], 200);
        } else {
            $checkPassword = Hash::check($userPassword, $user->password);
            if ($checkPassword) {
                $token = JwtToken::generateToken($userEmail, $user->id, 60 * 60 * 24); // Issue Token for 1 day
                if($user->role == 'admin'){
                    return response()->json([
                        'status' => 'success',
                        'url' => route('admin.dashboard'),
                        'message' => 'Sign in Successful.',
                        'token' => $token
                    ], 200)->cookie('signInToken', $token, 60 * 24); // set cookie for 1 day
                }else {
                    return response()->json([
                        'status' => 'success',
                        'url' => route('customer.dashboard'),
                        'message' => 'Sign in Successful.',
                        'token' => $token
                    ], 200)->cookie('signInToken', $token, 60 * 24); // set cookie for 1 day
                }
            } else {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Invalid Email or Password.'
                ], 200);
            }
        }



        // } catch (\Throwable $th) {
        //     return response()->json([
        //         'status' => 'failed',
        //         'message' => 'Something went wrong. Please try again.',
        //         'error' => $th->getMessage(),
        //     ], 500);
        // }
    }

    public function signOut()
    {
        return redirect(route('user.sign-in'))->cookie('signInToken', null, -1);
    }
}
