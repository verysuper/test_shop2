<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    public function signUpPage(){
        $binding = [
            'title'=>'註冊',
        ];
        return view('auth.signUp',$binding);
    }
    public function signUpProcess(Request $request){
        // $input=request()->all();
        // var_dump($input);
        // exit;
        $this->validate($request, [
            'nickname' => 'required|max:50',
        ]);
    }
}
