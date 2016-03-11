<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    protected $guarded = [
        'id', 'created_at'
    ];

    public function posts () {
        return $this->hasMany('\App\Post');
    }
    public function notes () {
        return $this->hasMany('\App\Note');
    }
    public function userType ()
    {
        return $this->hasOne('\App\UserType');
    }
}
