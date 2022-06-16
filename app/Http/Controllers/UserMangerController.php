<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserMangerController extends Controller
{
    public function index(){
        $users = User::all();
        return view('user-manger.index',compact('users'));
    }

    public function makeAdmin(Request $request){

        $currentUser = User::find($request->id);
        if ($currentUser->role == 2){
            $currentUser->role = '0';
            $currentUser->update();
        }

        return redirect()->route('user-manger.index')->with("toast",["icon" => "success" , "title" => "Role updated for" . $currentUser->name]);
    }
}
