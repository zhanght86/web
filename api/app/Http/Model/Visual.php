<?php

namespace App\Http\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Visual extends Model
{
    use Notifiable;
    protected $fillable = [
        'uId', 'name','author','pic','content','package','tag','thumb','view','time'
    ];
    protected $table = 'visual';
    public $timestamps = false;
}