<?php

namespace App\Http\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class UserCategory extends Model
{
    use Notifiable;
    protected $fillable = [
        'cId', 'uId', 'name', 'value', 'color', 'created_time', 'updated_time', 'icon'
    ];
    protected $table = 'user_category';
    public $timestamps = false;
}
