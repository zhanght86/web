<?php

namespace App\Http\Controllers;

use App\Http\Model\User;
use App\Http\Model\LoginLog;
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
            $user->status = 0;
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
        $ip = null;
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
                    /*写入log */
                    $ip = $this->get_onlineip();
                    $log = new LoginLog;
                    $log->lId = md5(uniqid());
                    $log->uId = $data->uId;
                    $log->loginname = $request->username;
                    $log->key = $key;
                    $log->degree = $identity;
                    $log->time = time();
                    $log->ip = $ip;
                    $log->platform = $this->get_os();
                    $log->browser = $this->GetBrowser();
                    $add = $this->GetIpLookup($ip);
                    $log->address = $add['country'].$add['province'].$add['city'];
                    $log->save ();
                } else {
                    $msg = '您没有权限登录本平台，请联系超级管理员！';
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
            'ip'=>$ip,
            'time'=>time()
        );
        return json_encode($out);
    }
    function get_onlineip() { 
        header("content-type:text/html;charset=utf-8");
        $url = 'http://www.ip138.com/ip2city.asp';  
        $info = file_get_contents($url); 
        preg_match('|<center>(.*?)</center>|i', $info, $m);  
        $arr = explode('[', $m[1]);
        $arr = explode(']', $arr[1]);
        return $arr[0]; 
    } 
    function get_os() {
        if (!empty($_SERVER['HTTP_USER_AGENT'])) {
            $os = $_SERVER['HTTP_USER_AGENT'];
            if (preg_match('/win/i', $os)) {
                $os = 'Windows';
            } else if (preg_match('/mac/i', $os)) {
                $os = 'MAC';
            } else if (preg_match('/linux/i', $os)) {
                $os = 'Linux';
            } else if (preg_match('/unix/i', $os)) {
                $os = 'Unix';
            } else if (preg_match('/bsd/i', $os)) {
                $os = 'BSD';
            } else {
                $os = 'Other';
            }
            return $os;
        } else {
            return 'unknow';
        }
    }
    function GetBrowser() {
        $Browser = $_SERVER['HTTP_USER_AGENT'];
        if (preg_match('/MSIE/i',$Browser)) {
            $Browser = 'MSIE';
        }
        elseif (preg_match('/Firefox/i',$Browser)) {
            $Browser = 'Firefox';
        }
        elseif (preg_match('/Chrome/i',$Browser)) {
            $Browser = 'Chrome';
        }
        elseif (preg_match('/Safari/i',$Browser)) {
            $Browser = 'Safari';
        }
        elseif (preg_match('/Opera/i',$Browser)) {
            $Browser = 'Opera';
        }
        else {
            $Browser = 'Other';
        }
        return $Browser;
    }
    function GetIpLookup($ip = ''){  
        if(empty($ip)){  
            $ip = GetIp();  
        }  
        $res = @file_get_contents('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip=' . $ip);  
        if(empty($res)){ return false; }  
        $jsonMatches = array();  
        preg_match('#\{.+?\}#', $res, $jsonMatches);  
        if(!isset($jsonMatches[0])){ return false; }  
        $json = json_decode($jsonMatches[0], true);  
        if(isset($json['ret']) && $json['ret'] == 1){  
            $json['ip'] = $ip;  
            unset($json['ret']);  
        }else{  
            return false;  
        }  
        return $json;  
    }  
}
