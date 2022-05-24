<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'name', 'release_date', 'type_of_media', 'official_title', 'synopsis',
    ];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'medias';

    public function photos(){

        return $this->hasMany('App\Models\MediaPhoto');
    }

    public function videos(){

        return $this->hasMany('App\Models\MediaVideo');
    }

    public function platforms(){

        return $this->hasMany('App\Models\MediaPlatform');
    }

    public function likes(){

        return $this->hasMany('App\Models\MediaLike');
    }
    public function avaliacoes(){

        return $this->hasMany('App\Models\MediaAvaliacao');
    }
}
