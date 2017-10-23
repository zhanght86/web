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
    }
    public function add (Request $request) {
        $visual = new Visual;
        $req = $request->all();
        foreach ($req as $key => $value) {
            if ($key != 'callback') {
                $visual->$key = $value;
            }
        }
        $visual->time = Carbon::now();
        $visual->save();
        return $visual;
    }
}
