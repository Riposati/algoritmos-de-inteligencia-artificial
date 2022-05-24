<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaAvaliacao extends Model
{
    
    public function users(){

        return $this->belongsTo('App\Models\User');
    }

    public function medias(){

        return $this->belongsTo('App\Models\Media');
    }
}