<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function add (Request $request) {
        $category = new Category;
        $req = $request->all();
        foreach ($req as $key => $value) {
            $category->$key = $value;
        }
        $category->uId = md5(uniqid());
        $category->created_time = time();
        $category->updated_time = time();
        $category->save();
        return $category;
    }
    public function parentlist (Request $request) {
        $result = Category::where('parent', null)->orderBy('created_time', 'desc')->get();
        return $result;
    }
    public function childlist (Request $request, $tag) {
        $result = Category::where('parent', $tag)->orderBy('sort', 'desc')->get();
        return $result;
    }
}
