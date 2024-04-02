<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function store(Request $request){
        $request->validate([
            "name" => "required",
            "email" => "required",
            "password" => "required",
            "gender" => "required"
        ]);

        $data = $request->all();

        User::create($data);

        return response()->json(['status','Student Stored Successfully'],200);

    }

    public function show_users(){
        return view('Show-Users');
    }

    public function show_user_ajax(){
        $users = User::all();
        return response()->json(['status'=>'Get User-Data Successfully','users',$users],200);
    }
}
