<?php

namespace App\Http\Controllers\test;

use App\Http\Controllers\Controller;

class testController extends Controller
{
    public function __construct(){}
    public function home(){
        $binding=[
            'title'=>'Home test',
        ];
        return view('test.home',$binding);
    }
}
