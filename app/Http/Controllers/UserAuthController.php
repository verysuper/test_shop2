<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Jobs\SendSignUpMailJob;
use Mail;
use Socialite;
use Validator;  // 驗證器
use Hash;       // 雜湊
use App\Shop\Entity\User;   // 使用者 Eloquent Model
use DB;
use Exception;

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

        // 密碼加密
        $input['password'] = Hash::make($input['password']);

        // 新增會員資料
        $Users = User::create($input);

        // 寄送註冊通知信
        $mail_binding = [
            'nickname' => $input['nickname'],
            // 'email' => $input['email'],
        ];

        // SendSignUpMailJob::dispatch($mail_binding)
        //     ->onQueue('high');
        Mail::send('email.signUpEmailNotification',$mail_binding,
        function($mail) use ($input){
            $mail->to($input['email']);
            $mail->from('ziv.tso@gmail.com');
            $mail->subject('恭喜註冊成功');
        });

        // 重新導向到登入頁
        return redirect('/user/auth/sign-in');
    }

    public function signInPage(){
        $binding=[
            'title'=>'登入',
        ];
        return view('auth.signIn',$binding);
    }
    public function signInProcess(){
        $input=request()->all();
        // var_dump($input);
        // exit;
        $rules = [
            'email'=>[
                'required',
                'max:150',
                'email',
            ],
            'password'=>[
                'required',
                'min:6',
            ],
        ];
        $validator=Validator::make($input,$rules);
        if ($validator->fails()) {
            // 資料驗證錯誤
            return redirect('/user/auth/sign-in')
                ->withErrors($validator)
                ->withInput();
        }
        $user=User::where('email',$input['email'])->firstOrFail();
        if(!$user){
            $error_message=[
                'msg'=>'無此帳號',
            ];
            return redirect('/user/auth/sign-in')
            ->withErrors($error_message)
            ->withInput();
        }
        $is_password_correct=Hash::check($input['password'], $user->password);
        if(!$is_password_correct){
            $error_message=[
                'msg'=>'密碼錯誤',
            ];
            return redirect('/user/auth/sign-in')
            ->withErrors($error_message)
            ->withInput();
        }
        // session 紀錄會員編號
        session()->put('user_id', $user->id);

        // 重新導向到原先使用者造訪頁面，沒有嘗試造訪頁則重新導向回首頁
        return redirect()->intended('/');
    }
    // 處理登出資料
    public function signOut(){
        // 清除 Session
        session()->forget('user_id');

        // 重新導向回首頁
        return redirect('/user/auth/sign-in');
    }
}
