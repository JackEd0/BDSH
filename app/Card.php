<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $guarded = [
        'id', 'created_at',
    ];

    public function cardAssociation()
    {
        return $this->belongTo('\App\CardAssociation');
    }

    public function cardType()
    {
        return $this->hasMany('\App\CardType');
    }

    public function document()
    {
        return $this->hasMany('\App\Document');
    }

    protected $fillable = [
        'id', 'card_type_id',
    ];
}
