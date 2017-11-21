<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Model\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
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
            $articles = Article::where($key, 'like', '%'.$value.'%')->orderBy('created_time', 'desc')->paginate($pageSize);
        }else{
            $articles = Article::orderBy('created_time', 'desc')-> paginate($pageSize);
        }
        return $articles;
    }
    public function add (Request $request) {
        $articles = new Article;
        $req = $request->all();
        foreach ($req as $key => $value) {
            $articles->$key = $value;
        }
        $articles->aId = md5(uniqid());
        $articles->created_time = time();
        $articles->updated_time = time();
        $articles->thumb = 0;
        $articles->view = 0;
        $articles->save();
        return $articles;
    }
    public function info (Request $request, $id) {
        $article = Article::where('aId', $id)->first();
        return $article;
    }
}
