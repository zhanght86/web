<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Model\GroupCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class GroupCategoryController extends Controller
{
    public function add (Request $request) {
        $category = new GroupCategory;
        $req = $request->all();
        foreach ($req as $key => $value) {
            $category->$key = $value;
        }
        $category->gId = md5(uniqid());
        $category->created_time = time();
        $category->updated_time = time();
        $category->save();
        return $category;
    }
    // public function list (Request $request) {
    //     $category = GroupCategory::orderBy('sort', 'desc')->get();
    //     return json_encode($category);
    // }
    public function list (Request $request) {
        $parent = GroupCategory::where('pId', null)->orderBy('sort', 'desc')->get();
        $children = GroupCategory::where('pId' , '<>' , null)->orderBy('sort', 'desc')->get()->groupBy('pId');
        $out= array();
        foreach($parent as $key=>$value) {
            foreach($children as $k=>$v) {
                if ($value['gId'] == $k) {
                    $parent[$key]['children'] = $v;
                }
            }
        }
        return json_encode($parent);
    }
    public function del (Request $request, $id) {
        $category = GroupCategory::where('gId', $id)->first();
        $category->delete();
        $son = GroupCategory::where('pId', $id)->get();
        // $son->delete();
        foreach($son as $key=>$value) {
            $value->delete();
        }
        return $category;
    }
}
