<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Model\UserCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class UserCategoryController extends Controller
{
    public function add (Request $request) {
        $category = new UserCategory;
        $req = $request->all();
        foreach ($req as $key => $value) {
            $category->$key = $value;
        }
        $category->cId = md5(uniqid());
        $category->created_time = time();
        $category->updated_time = time();
        $category->save();
        return $category;
    }
    public function list (Request $request) {
        $category = UserCategory::orderBy('value', 'desc')->get();
        return json_encode($category);
    }
    public function del (Request $request, $id) {
        $category = UserCategory::where('cId', $id)->first();
        $category->delete();
        return $category;
    }
}
