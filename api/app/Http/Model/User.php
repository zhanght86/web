<?php

namespace App\Http\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use Notifiable;
    protected $fillable = [
        'uId', 'username', 'password', 'name', 'QQ', 'wechat', 'phone', 'email', 'sex', 'depart', 'face', 'identity', 'status', 'created_time', 'updated_time'
    ];
    protected $table = 'user';
    public $timestamps = false;
}
