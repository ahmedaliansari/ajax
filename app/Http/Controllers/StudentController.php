<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    // View Student Page
    public function view_std_page(){
        return view('Student-Form');
    }


    public function store_student(Request $request){
        $request->validate([
            "name" => "required",
            "phone" => "required",
            "email" => "required",
            "password" => "required",
            "gender" => "required",
            "status" => "required",
            "jobs" => "required",
            "address" => "required",
        ]);

        $data = $request->all();

        Student::create($data);

        return response()->json(['status'=>'Student Stored Successfully'], 200);

    }

    public function show_student(){
        return view('Show-Student');
    }

   public function show_student_ajax(){
    $student = Student::all();
    return response()->json(['status' => 'Get Student Successfully', 'student' => $student], 200);
}




}
