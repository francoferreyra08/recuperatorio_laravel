<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    public function TraerNombre() {
   //traemos el nombre y apellido de la tabla actor
      $nc = $this->first_name . " " . $this->last_name;
      return $nc;
    }
}
