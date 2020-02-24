<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
   protected $fillable = [
        'popularity',
        'vote_count',
        'video',
        'poster_path',
        'genre_ids',
        'adult',
        'original_language',
        'original_title',
        'title',
        'vote_average',
        'overview',
        'release_date',
    ];
}
