<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{


    public function movie(){
      return $this->HasMany(Movie::class,'movies_id','genre_id');

    }

      public function genre(){
        return $this->BelongsTo(Genre::class,'movies_id');
    }



}
