<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dev extends Model
{
    // Campos que o módel tem, definidos pelas migrations ( ISSO NÃO É UM SERIALIZER, mas é similar )
    protected $fillable = [
      'github_username', 'bio', 'avatar_url', 'name', 'latitude', 'longitude'
    ];

    //MySQL é um banco relacional, o Laravel facilita isso para a gente colocando uma maneira simples de definir relações
    //Como por exemplo uma (um para vários), já que um dev tem várias techs, usamos o hasMany(App\Tech)
    public function techs()
    {
        return $this->hasMany('App\Tech');
    }


    public function scopeCloseTo($query, $location, $radius = 25)
    {
        //Uma função parecida com o NEAR usado no MongoDB, retirado de: https://stackoverflow.com/questions/38621531/radius-search-with-google-maps-and-mysql-in-laravel
        /**
         * In order for this to work correctly, you need a $location object
         * with a ->latitude and ->longitude.
         */
        $haversine = "(6371 * acos(cos(radians($location->latitude)) * cos(radians(latitude)) * cos(radians(longitude) - radians($location->longitude)) + sin(radians($location->latitude)) * sin(radians(latitude))))";
        return $query
            ->select(array_merge(['id'], $this->getFillable()))
            ->selectRaw("{$haversine} AS distance")
            ->whereRaw("{$haversine} < ?", [$radius]);
    }

}
