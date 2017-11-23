<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Model\Theme;
use App\Http\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ThemeController extends Controller
{
    public function add (Request $request) {
        $theme = new Theme;
        $req = $request->all();
        foreach ($req as $key => $value) {
            $theme->$key = $value;
        }
        $theme->tId = md5(uniqid());
        $theme->created_time = time();
        $theme->update_time = time();
        $theme->save();
        return json_encode(array(
            "status" => 1,
            "msg" => '添加成功！',
            "data" => $theme
        ));
    }
    public function setTheme (Request $request) {
        $user = User::where('uId', $request->id)->first();
        $user->theme = $request->theme;
        $user->save();
        return $user;
    }
    public function info (Request $request, $id) {
        $theme = Theme::where('uId', $id)->first();
        return $theme;
    }
    public function list (Request $request) {
        $theme = Theme::all();
        return json_encode($theme);
    }
}
