<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [
        'id', 'created_at'
    ];
    public function notes () {
        return $this->hasMany('\App\Note');
    }
    public function user () {
        return $this->belongsTo('\App\Utilisateur');
    }
}
