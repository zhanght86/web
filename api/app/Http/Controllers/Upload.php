<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Validator;

class Upload extends Controller
{
    public function upfile(Request $request) {
        if ($request -> isMethod('POST')) {
            $file = $request -> file('upFile');
            if ($file -> isValid()){
                $originalName = $file->getClientOriginalName();  
                //扩展名  
                $ext = $file->getClientOriginalExtension();  
                //文件类型  
                $type = $file->getClientMimeType();  
                //临时绝对路径  
                $realPath = $file->getRealPath();  
                $type = $request->all()['type'];
                $filename = $type.date('YmdHiS').uniqid().'.'.$ext;  
                $bool =Storage::disk('uploads')->put($filename, file_get_contents($realPath));
                $result = array(
                    'data' => $request->all()['file'].$filename,
                    'text' => '上传成功！',
                    'status' => 1,
                    'request' => $request->all()
                );
                return json_encode($result);
            }
        }
    }
}
