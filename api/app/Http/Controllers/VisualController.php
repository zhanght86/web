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
            $Visuals = Visual::where($key, 'like', '%'.$value.'%')->orderBy('created_time', 'desc')->paginate($pageSize);
        }else{
            $Visuals = Visual::orderBy('created_time', 'desc')-> paginate($pageSize);
        }
        return $Visuals;
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
    public function del (Request $request, $uId) {
        $visual = Visual::where('uId', $uId);
        $pic=$visual->select('pic')->get();
        // $visual->delete();
        return $pic;
    }
}
