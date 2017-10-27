<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Model\Visual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisualController extends Controller
{
    //
    public function list (Request $request) {
        $req = $request->all();
        $pageSize = $request->pageSize;
        $currentPage = $request->currentPage;
        foreach($req as $key => $value){
            if($key == 'pageSize' || $key == 'page'){
                unset($req[$key]);
            }
        }
        if(count($req)>0){
            $Visuals = Visual::where($key, 'like', '%'.$value.'%')->paginate($pageSize);
        }else{
            $Visuals = Visual::paginate($pageSize);
        }
        return $Visuals;
        // $time = time();
        // return $time;
    }
    public function add (Request $request) {
        $visual = new Visual;
        $req = $request->all();
        foreach ($req as $key => $value) {
            $visual->$key = $value;
        }
        $visual->uId = md5(uniqid());
        $visual->created_time = time();
        $visual->updated_time = time();
        $visual->thumb = 0;
        $visual->view = 0;
        $visual->save();
        return $visual;
    }
    public function upfile (Request $request) {
        return 1;
    }
}
