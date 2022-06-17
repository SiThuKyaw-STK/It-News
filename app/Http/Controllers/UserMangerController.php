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

//        return User::find($request->id);

        $currentUser = User::find($request->id);
        if ($currentUser->role == 1){
            $currentUser->role = '0';
            $currentUser->update();
        }

        return redirect()->route('user-manger.index')->with("toast",["icon" => "success" , "title" => "Role updated for " . $currentUser->name]);
    }

    public function banUser(Request $request){

//        return User::find($request->id);

        $currentUser = User::find($request->id);
        if ($currentUser->isBanded == 0){
            $currentUser->isBanded = '1';
            $currentUser->update();
        }

        return redirect()->route('user-manger.index')->with("toast",["icon" => "success" , "title" => $currentUser->name . " is baned!!!"]);
    }

    public function restoreUser(Request $request){

//        return User::find($request->id);

        $currentUser = User::find($request->id);
        if ($currentUser->isBanded == 1){
            $currentUser->isBanded = '0';
            $currentUser->update();
        }

        return redirect()->route('user-manger.index')->with("toast",["icon" => "success" , "title" => $currentUser->name . " is restored!!!"]);
    }
}
