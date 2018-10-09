<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;  // 驗證器

class UserAuthController extends Controller
{
    public function signUpPage(){
        $binding = [
            'title'=>'註冊',
        ];
        return view('auth.signUp',$binding);
    }
    // 處理註冊資料
    public function signUpProcess(){
        // 接收輸入資料
        $input = request()->all();

        // 驗證規則
        $rules = [
            // 暱稱
            'nickname'=> [
                'required',
                'max:50',
            ],
            // Email
            'email'=> [
                'required',
                'max:150',
                'email',
            ],
            // 密碼
            'password' => [
                'required',
                'same:password_confirmation',
                'min:6',
            ],
            // 密碼驗證
            'password_confirmation' => [
                'required',
                'min:6',
            ],
            // 帳號類型
            'type' => [
                'required',
                'in:G,A'
            ],
        ];

        // 驗證資料
        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            // 資料驗證錯誤
            return redirect('/user/auth/sign-up')
                ->withErrors($validator)
                ->withInput();
        }

        // 重新導向到登入頁
        return redirect('/user/auth/sign-in');
    }
}
