<?php

namespace App;
namespace App\Http\Model;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Notifiable;
    protected $fillable = [
        'uId', 'text','tag', 'letter', 'color' ,'icon','url','created_time','updated_time','author', 'sort'
    ];
    protected $table = 'category';
    public $timestamps = false;
}
