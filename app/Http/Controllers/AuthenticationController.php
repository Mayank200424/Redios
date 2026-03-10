<?php

namespace App\Http\Controllers;

use App\Models\LoginLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use App\Http\Requests\AuthenticationRequest;
use App\Http\Requests\LoginRequest;

class AuthenticationController extends Controller {
    
    public function register() {
        return view( 'signUp' );
    }

    public function signUp( AuthenticationRequest $request ) {

        $data = $request->validated(); 

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make( $data['password'] );
        $user->role = $data['role'];

        if ( $user->save() ) {
            return redirect()->route( 'login' )->with( 'success', 'Register SuccessFully' );
        } else {
            return redirect()->back()->with( 'error', 'Register Failed' );
        }
    }

    public function login() {
        return view( 'signIn' );
    }

    public function signIn( LoginRequest $request ) {
        $credentials = $request->validated(); 

        if ( Auth::attempt( $credentials ) ) {

            $request->session()->regenerate();
            $user = Auth::user();

            $login_log = new LoginLog();
            $login_log->user_id = $user->id;
            $login_log->login_time = now();
            $login_log->save();
            
            if ( $user->role == 'admin' ) {
                return redirect()->route( 'admin.index' )->with( 'success', 'Admin Login Successful' );
            } elseif ( $user->role == 'customer' ) {
                return redirect()->route( 'customer.index' )->with( 'success', 'Customer Login Successful' );
            } elseif ( $user->role == 'vendor' ) {
                return redirect()->route( 'vendor.index' )->with( 'success', 'Vendor Login Successful' );
            } elseif ( $user->role == 'delivery_boy' ) {
                return redirect()->route( 'deliveryboy.index' )->with( 'success', 'Delivery Boy Login Successful' );
            } else {
                Auth::logout();
                return redirect()->route( 'login' )->with( 'error', 'Invalid user role' );
            }
        }
        return back()->with( 'error', 'Invalid email or password' )->withInput();
    }

    public function logout( Request $request ) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route( 'login' )->with( 'success', 'Logged out successfully' );
    }

    public function forgotPassword() {
        return view( 'forgot-password' );
    }

    public function showResetForm( $token ) {
        return view( 'reset-password', [ 'token' => $token ] );
    }

    public function sendResetLink( Request $request ) {
        $request->validate( [
            'email' => 'required|email'
        ] );

        $status = Password::sendResetLink( $request->only( 'email' ) );

        return $status === Password::RESET_LINK_SENT
        ? back()->with( 'success', 'Reset link sent to email' )
        : back()->with( 'error', 'Email not found' );
    }

    public function resetPassword( Request $request ) {
        $request->validate( [
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
            'token' => 'required'
        ] );

        $status = Password::reset(
            $request->only( 'email', 'password', 'password_confirmation', 'token' ),

            function ( $user, $password ) {
                $user->password = Hash::make( $password );
                $user->save();
            }
        );

        return $status === Password::PASSWORD_RESET
        ? redirect()->route( 'login' )->with( 'success', 'Password Reset Successfully' )
        : back()->with( 'error', 'Invalid Token' );
    }

    public function updateProfile( Request $request ) {
        $request->validate( [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
        ] );

        $user = Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;

        if ( $user->save() ) {
            if ( $request->ajax() || $request->wantsJson() ) {
                return response()->json( [
                    'success' => true,
                    'message' => 'Profile updated successfully!'
                ] );
            }
            return redirect()->back()->with( 'success', 'Profile updated successfully!' );
        } else {
            if ( $request->ajax() || $request->wantsJson() ) {
                return response()->json( [
                    'success' => false,
                    'message' => 'Profile update failed'
                ], 422 );
            }
            return redirect()->back()->with( 'error', 'Profile update failed' );
        }
    }
}
