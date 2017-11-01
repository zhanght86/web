<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaptchaController extends Controller
{
    public function result (Request $request) {
        return captcha_src();
    }
    public function check (Request $request) {
        if (Request::getMethod() == 'POST') {
            $rules = ['captcha' => 'required|captcha'];
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) {
                return '失败';
            } else {
                return '通过';
            }
        }
    }
}
