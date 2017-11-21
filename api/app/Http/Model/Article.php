<?php

namespace App\Http\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use Notifiable;
    protected $fillable = [
        'aId', 'title', 'category', 'tags', 'editor', 'summary', 'cover', 'author', 'publish', 'recommend', 'fine', 'description', 'original', 'created_time', 'updated_time', 'originallink'
    ];
    protected $table = 'article';
    public $timestamps = false;
}
