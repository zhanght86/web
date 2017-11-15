<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Gregwar\Captcha\CaptchaBuilder;

class CaptchaController extends Controller
{
    public function result (Request $request) {
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 140, $height = 40, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();
        //把内容存入session
        session_start();
        $_SESSION['captcha'] = $phrase;
        // $request->session()->put('captcha', $phrase);
        //生成图片
        header('Content-Type: image/jpeg');
        $builder->output();
        // return $request->session()->get('captcha');
    }
    public function check (Request $request) {
        $input = $request->get('captcha');
        session_start();
        $captcha = $_SESSION['captcha'];
        if ($input == $captcha) {
            return json_encode(array(
                'status'=>1,
                'input'=>$input,
                'captcha'=> $captcha,
                'msg'=> '验证码正确！'
            ));
        } else {
            return json_encode(array(
                'status'=> 0,
                'input'=>$input,
                'captcha'=> $captcha,
                'msg'=>'验证码错误！'
            ));
        }
    }
}
