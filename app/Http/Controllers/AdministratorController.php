<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{User, Course, Instructor, CourseCategory, Learner, Partner, Allocation};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Repository;
class AdministratorController extends Controller
{
   
    public function show()
    {
       $data = [
            "course" => Course::all(),
            "course_category" => CourseCategory::all(),
            "partner" => Partner::all(),
            "instructor" => Instructor::all(),
            "learner" => Learner::all(),
            "allocation" => Allocation::all(),
            "user" => User::all(),
        ];
        return view("admin.dashboard")->with($data);
    }

    

    public function updatePassword(Request $request)
    {
        $validate = $request->validate([
            "password" => 'required|confirmed'
        ]);

        User::where("id", Auth::id())->update([
            "password" => Hash::make($request->password)
        ]);
        return redirect()->back()->with("success", "Password changed");
    }
}
