<?php

namespace App\Http\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use Notifiable;
    protected $fillable = [
        'pId', 'uId', 'name', 'group', 'category', 'tag', 'cover', 'content', 'file', 'preview', 'mode', 'author', 'view', 'created_time', 'updated_time', 'thumb', 'download'
    ];
    protected $table = 'project';
    public $timestamps = false;
}
