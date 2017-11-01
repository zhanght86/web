<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CaptchaController extends Controller
{
    public function result (Request $request) {
        return Captcha_url();
    }
    public function check (Request $request) {
            $rules = ['captcha' => 'required|captcha'];
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails())
            {
                echo '错误';
            }
            else
            {
                echo '正确';
            }
    }
}
