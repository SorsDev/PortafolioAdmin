<?php

namespace App\Http\Controllers;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class ChangePass extends Controller
{
    public function CPassword(){
        return view('admin.body.change_password');
    }


    public function PasswordUpdate(Request $request){

        $validatedData = $request->validate([

            'oldpassword' => 'required',
            'password' => 'required|confirmed' 
        ]); 

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashedPassword)){
            $user = User::findOrFail(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login')->with('succes','password is change successfuly');
        }else{
            return redirect()->back()->with('error','Current password is invalid');
        }

    }


    public function Pupdate(){
        if(Auth::user()){
            $user = User::findOrFail(Auth::user()->id);
            if($user){
                return view('admin.body.update_profile',compact('user'));
            }
        }
    }


    public function UpdateProfile(Request $request){

        $user = User::findOrFail(Auth::user()->id);
        if($user){
            $user->name = $request['name'];
            $user->email = $request['email'];

            $user->save();

            return Redirect()->back()->with('success','Perfil del usuario actualizado');
        }else{
            return Redirect()->back();
        }

    }

}
