<?php

namespace App\Http\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class GroupCategory extends Model
{
    use Notifiable;
    protected $fillable = [
        'gId', 'uId', 'name', 'sort', 'color', 'created_time', 'updated_time', 'icon', 'en'
    ];
    protected $table = 'group_category';
    public $timestamps = false;
}
