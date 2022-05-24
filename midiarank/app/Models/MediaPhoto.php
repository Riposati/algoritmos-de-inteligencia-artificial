<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaPhoto extends Model
{
    protected $fillable = [
        'photo', 'media_id',
    ];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'medias_photos';

    public function media(){

        return $this->belongsTo('App\Models\Media');
    }
}
