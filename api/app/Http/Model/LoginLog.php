<?php

namespace App\Http\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class LoginLog extends Model
{
    use Notifiable;
    protected $fillable = [
        'lId', 'uId', 'loginname', 'key', 'degree', 'ip', 'time', 'platform', 'browser', 'address'
    ];
    protected $table = 'login_log';
    public $timestamps = false;
}
