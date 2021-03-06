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
        $css = ".".$request->name." .aside{background:".$request->color.";}.".$request->name." .ivu-menu-dark.ivu-menu-vertical .ivu-menu-item-active:not(.ivu-menu-submenu),.".$request->name." .ivu-menu-dark.ivu-menu-vertical .ivu-menu-item-active:not(.ivu-menu-submenu):hover,.".$request->name." .ivu-menu-dark.ivu-menu-vertical .ivu-menu-submenu-title-active:not(.ivu-menu-submenu),.".$request->name." .ivu-menu-dark.ivu-menu-vertical .ivu-menu-submenu-title-active:not(.ivu-menu-submenu):hover,.".$request->name." .ivu-menu-dark.ivu-menu-vertical .ivu-menu-item:hover{background:".$request->activecolor.";color:#fff;border-right-color: ".$request->activecolor.";}.ivu-tabs-nav .ivu-tabs-tab-active{color:".$request->color."}.ivu-tabs-ink-bar{background:".$request->color."}.ivu-btn-primary{background:".$request->color.";border-color:".$request->color."}.ivu-btn-primary:hover{background:".$request->activecolor.";border-color:".$request->color."}a{color:".$request->color."}a:hover{color:".$request->activecolor."}.ivu-radio-group-button .ivu-radio-wrapper-checked{color:".$request->color.";border-color:".$request->color.";box-shadow: -1px 0 0 0 ".$request->color."}.ivu-icon{color:".$request->color." !important;}.ivu-switch-checked{background:".$request->color.";border-color:".$request->color."}.ivu-radio-group-button .ivu-radio-wrapper-checked:first-child{border-color:".$request->color."}.ivu-btn-text:hover{color:".$request->color."}.ivu-tabs-nav .ivu-tabs-tab:hover{color:".$request->color."}.ivu-radio-group-button .ivu-radio-wrapper:hover{color:".$request->activecolor."}.ivu-btn-ghost:hover{border-color:".$request->activecolor.";color:".$request->activecolor."}";
        $output_file = $request->name.'.css';
        $a = Storage::disk('uploads')->put($output_file, $css);
        $theme->css=$output_file;
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
    public function info (Request $request, $name) {
        $theme = Theme::where('name', $name)->first();
        return $theme;
    }
    public function list (Request $request) {
        $theme = Theme::all();
        return json_encode($theme);
    }
}
