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
        $id = md5(uniqid());
        $articles = new Article;
        $req = $request->all();
        foreach ($req as $key => $value) {
            if ($key == 'description') {
                $articles->html = $id.'.html';
                $articles->description = $value;
            } else if($key == 'md') {
                $articles->md = $id.'.md';
            } else {
                $articles->$key = $value;
            }
        }
        $articles->aId = $id;
        $articles->created_time = time();
        $articles->updated_time = time();
        $articles->thumb = 0;
        $articles->view = 0;
        $articles->save();
        Storage::disk('uploads')->put($id.'.md', $request->md);
        Storage::disk('uploads')->put($id.'.html', $request->description);
        return $articles;
        // return $articles;
    }
    public function info (Request $request, $id) {
        $article = Article::where('aId', $id)->first();
        return $article;
    }
    public function download (Request $request, $id) {
        $content = Article::where('aId', $id)->first();
        return response()->download(realpath(base_path('storage/app/uploads')).'/'.$content->aId.'.md', $content->title.'.md');
    }
}
