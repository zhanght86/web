<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Model\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
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
            $projects = Project::where($key, 'like', '%'.$value.'%')->orderBy('created_time', 'desc')->paginate($pageSize);
        }else{
            $projects = Project::orderBy('created_time', 'desc')-> paginate($pageSize);
        }
        return $projects;
    }
    public function add (Request $request) {
        $projects = new Project;
        $req = $request->all();
        foreach ($req as $key => $value) {
            $projects->$key = $value;
        }
        $projects->pId = md5(uniqid());
        $projects->created_time = time();
        $projects->updated_time = time();
        $projects->thumb = 0;
        $projects->view = 0;
        $projects->download = 0;
        $projects->save();
        return $projects;
    }
    public function info (Request $request, $id) {
        $Project = Project::where('aId', $id)->first();
        return $Project;
    }
}
