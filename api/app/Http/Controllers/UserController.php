<?php

namespace App\Http\Controllers;

use App\Http\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function add (Request $request) {
        $user = new User;
        $req = $request->all();
        $status = 1;
        $msg = '注册成功！';
        $data = null;
        if (count($req) !== 2) {
            $status = 0;
            $msg = '参数不合法！';
        } else if (count(User::where('username', $request->username)->get())) {
            $status = 2;
            $msg = '该用户已存在！';
        }else {
            foreach ($req as $key => $value) {
                if ($key === 'password') {
                    $user->$key = md5($value);
                } else {
                    $user->$key = $value;
                }
            }
            $user->uId = md5(uniqid());
            $user->created_time = time();
            $user->updated_time = time();
            $user->save ();
            $data = $user;
        }
        $out = array(
            'status'=> $status,
            'data' => $data,
            'msg'=> $msg
        );
        return json_encode($out);
    }
    public function author (Request $request) {
        $req = $request->all();
        $status = 1;
        $msg = '登录成功！';
        $key = '';
        $identity = 0;
        $data = null;
        if (count($req) !== 3) {
            $status = 0;
            $msg = '参数不合法！';
        } else {
            $mail="/([a-z0-9]*[-_.]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[.][a-z]{2,3}([.][a-z]{2})?/i";
            $phone="/(13\d|14[57]|15[^4,\D]|17[13678]|18\d)\d{8}|170[0589]\d{7}/";
            $identity = intval($request->status);
            if (preg_match($mail, $request->username)) {
                $data = User::where('email', $request->username)->where('password', md5($request->password))->first();
                $key='邮箱';
            } else if (preg_match($phone, $request->username)) {
                $data = User::where('phone', $request->username)->where('password', md5($request->password))->first();
                $key='手机号';
            } else {
                $data = User::where('username', $request->username)->where('password', md5($request->password))->first();
                $key='用户名';
            }
            if (!count($data)){
                $status = 2;
                $msg = '用户名或者密码有误！';
                $data = null;
            } else {
                // 登录成功
                if ($data->status >= $request->status) {
                    $msg = '登录成功！';
                    $data->password = '******';
                    $status = 1;
                } else {
                    $msg = '您没有权限登录本平台！';
                    $status = 3;
                    $data = null;
                }
            }
        }
        $out = array(
            'status'=> $status,
            'data' => $data,
            'msg'=> $msg,
            'identity'=>$identity,
            'captcha'=> 0,
            'key'=>'通过'.$key.'登录',
            'ip'=>$request->getClientIp(),
            'time'=>time()
        );
        return json_encode($out);
    }
}
