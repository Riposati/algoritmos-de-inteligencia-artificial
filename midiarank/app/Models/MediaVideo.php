<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaVideo extends Model
{
    protected $fillable = [
        'video', 'media_id',
    ];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'medias_videos';

    public function media(){

        return $this->belongsTo('App\Models\Media');
    }
}
