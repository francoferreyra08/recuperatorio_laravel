<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    protected $table = ('movies');
    //private $primarykey = ('id');
    //private $timesstamps = false;
    protected $guarded=[];
}
