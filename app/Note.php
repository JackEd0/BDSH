<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $guarded = [
        'id', 'created_at'
    ];

    public function post () {
        return $this->belongsTo('\App\Post');
    }
    public function user () {
        return $this->belongsTo('\App\Utilisateur');
    }
}
