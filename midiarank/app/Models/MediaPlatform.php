<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaPlatform extends Model
{
    protected $fillable = [
        'name', 'media_id',
    ];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'medias_platforms';

    public function media(){

        return $this->belongsTo('App\Models\Media');
    }
}
