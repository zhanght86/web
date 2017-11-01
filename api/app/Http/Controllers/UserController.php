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
        $data = null;
        if (count($req) !== 2) {
            $status = 0;
            $msg = '参数不合法！';
        } else {
            $data = User::where('username', $request->username)->where('password', md5($request->password))->get();
            if (!count($data)){
                $status = 2;
                $msg = '用户名或者密码有误！';
                $data = null;
            }
        }
        $out = array(
            'status'=> $status,
            'data' => $data,
            'msg'=> $msg
        );
        return json_encode($out);
    }
}
