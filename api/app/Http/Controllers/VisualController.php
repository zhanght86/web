<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Model\Visual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $visual->download = 0;
        $visual->save();
        return $visual;
    }
    public function del (Request $request, $uId) {
        $visual = Visual::where('uId', $uId);
        $pic=$visual->select('pic')->get(1)[0]['pic'];
        $content=$visual->select('content')->get(1)[0]['content'];
        $package=$visual->select('package')->get(1)[0]['package'];
        if (Storage::disk('uploads')->delete($pic) && Storage::disk('uploads')->delete($content) && Storage::disk('uploads')->delete($package)) {
            $visual->delete();
            return json_encode(array(
                'msg'=>"成功删除！",
                'status'=> 1
            ));
        }
    }
    public function detail (Request $request, $uId) {
        $visual = Visual::where('uId', $uId)->first();
        return json_encode($visual);
    }
}
