<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    //
    protected $guarded = [
        'id', 'created_at'
    ];
    public function user ()
    {
        return $this->belongsTo('\App\User','user_type','user_type_id');
    }
}
