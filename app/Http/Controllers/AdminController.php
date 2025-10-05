<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\VarDumper\Caster\RedisCaster;

class AdminController extends Controller
{
    //
    public function adminProfile(){
        return view('backend.admin-profile');
    }
    public function pageOverview()
    {
        return view('backend.page-Overview');
    }
    public function manageUser()
    {
        $students = User::with('student')->whereHas('student', fn($q) => $q->where('status', 'active'))->get();
        $admins = User::where('role', 'admin')->get();
        $users = $admins->merge($students);

        return view('backend.manage-user', compact('users'));
    }
    public function manageStudent()
    {
        $students = Student::with('user')->where('status', 'active')->get();
        return view('backend.manage-students', compact('students'));
    }
    public function manageTeacher()
    {
        return view('backend.manage-teachers');
    }
    public function studentPending()
    {
        $pendingStundent = Student::with('user')->where('status', 'pending')->get();
        return view('backend.student-pending-list', compact('pendingStundent'));
    }
    public function approveStudent($id)
    {
        $student = Student::findOrFail($id);
        if ($student->status === 'pending') {
            $student->status = 'active';  // approved
            $student->save();
        }
        return response()->json([
            'message' => 'Approve success.',
            'data' => $id
        ], 200);
    }
    public function createUserSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required'
        ]);


        // $user = User::where('email', $request->email)->first();
        // if($user){
        //     return back()->withInput($request->only('email'))->with('error', 'exist email');
        // }
        $create_user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        if (strtolower($request->role) == 'student') {
            $create_user->student()->create([
                'status' => 'active'
            ]);
        }
        if ($create_user) {
            return back()->with('success', 'Create user success.');
        }
    }
    public function departments(){
        return view('backend.departments');
    }
}
