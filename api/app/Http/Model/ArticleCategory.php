<?php

namespace App\Http\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    use Notifiable;
    protected $fillable = [
        'cId', 'uId', 'name', 'sort', 'color', 'created_time', 'updated_time', 'icon', 'en'
    ];
    protected $table = 'article_category';
    public $timestamps = false;
}
