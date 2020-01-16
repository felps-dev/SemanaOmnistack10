<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tech extends Model
{
    // Campos que o módel tem, definidos pelas migrations ( ISSO NÃO É UM SERIALIZER, mas é similar )
    protected $fillable = [
      'name'
    ];
}
