<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardAssociation extends Model
{
    protected $guarded = [
        'id', 'created_at',
    ];
    protected $fillable = [ 
        'value', 'card_id', 'card_attribute_id'
    ];

    public function card()
    {
        return $this->hasMany('\App\Card');
    }

    public function cardAttribute()
    {
        return $this->hasMany('\App\CardAttribute');
    }
}
