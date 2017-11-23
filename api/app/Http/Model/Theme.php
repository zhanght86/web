<?php

namespace App\Http\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use Notifiable;
    protected $fillable = [
        'tId', 'uId', 'color', 'created_time', 'updated_time', 'name'
    ];
    protected $table = 'theme';
    public $timestamps = false;
}
