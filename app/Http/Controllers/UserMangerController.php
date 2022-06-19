<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

    public function changeUserPassword(Request $request){

        $validation = Validator::make($request->all(),[
            "password"=>"required|String|min:8"
        ]);

        if ($validation->fails()){
            return response()->json(["status"=>422,"message"=>$validation->errors()]);
        }

        $currentUser = User::find($request->id);
        if ($currentUser->role == 1){
            $currentUser->password = Hash::make($request->password);
            $currentUser->update();
        }

        return response()->json(["status"=>200,"message"=>"password changed for ".$currentUser->name]);
    }
}
