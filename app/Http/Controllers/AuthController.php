<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
     public function studentRegister(){
        return view('article.student-register');
    }
    public function studentLogin(){
        return view('article.student-login');
    }

    public function Login(Request $request)
    {
        $confirm_user = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);
        $user = User::where('email', $confirm_user['email'])->first();
        if (!$user) {
            return back()->withInput($request->only('email'))->with('error', 'Invalid Email');
        }
        if (Auth::attempt($confirm_user)) {
            if (Auth::user()->role == "admin") {
                return redirect('/admin-dashboard');
            }
        }
        return back()->with([
            'error' => 'Incorrect Password'
        ]);
    }
    public function Logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/student-login');
    }
        public function studentRegisterSubmit(Request $request){
      $request->validate([
        'fullName' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
        'dateOfBirth' => 'required',
        'gender' => 'required|string',
        'address' => 'required',
        'phoneNumber' => 'required',
        'parentGuardian' => 'required',
        'parentContact' => 'required'
      ]);
      $create_user = User::create([
       'name' => $request->fullName,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        
      ]);
      $create_user->student()->create([
        'date_of_birth' => $request->dateOfBirth,
        'gender' => $request->gender,
        'address' => $request->address,
        'phone_number' => $request->phoneNumber,
        'parent' => $request->parentGuardian,
        'parent_phone' => $request->parentContact,
      ]);
        if ($create_user) {
                return redirect('/student-login')
                    ->with('success', 'Registration successful. Please wait for admin approval before logging in.');
            } else {
                return redirect()->back()
                    ->with('error', 'Registration failed, please try again.');
            }

     }


}
