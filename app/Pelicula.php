<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
  public $guarded=[];


public function actor(){
  return $this->BelongsToMany(Actor::class,'actor_movie','movies_id','actor_id');
}

public function genre(){
  return $this->BelongsTo(Genre::class,'genre_id');
}


public function actorMovies(){
  return $this->HasMay(Actor::class,'_movie_id');
}



}
