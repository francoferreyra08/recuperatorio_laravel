<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
  public function movie(){
  return $this->BelongsToMany(movie::class,'actor_movie', 'actor_id','movies_id');
}


  public function moviesActor(){
      return $this->BelongsTo(Movie::class,'favorite_movie_id');
  }



}
