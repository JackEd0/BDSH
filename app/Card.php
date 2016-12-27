<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $guarded = [
        'id', 'created_at',
    ];

    protected $fillable = [
        'id', 'card_type_id', 'card_number', 'collection_id',
    ];

    public function cardAssociation()
    {
        return $this->belongsTo('\App\CardAssociation', 'card_id');
    }

    public function cardType()
    {
        return $this->hasOne('\App\CardType', 'id');
    }

    public function collection()
    {
        return $this->hasOne('App\Collection', 'id');
    }

    public function document()
    {
        return $this->belongsTo('\App\Document', 'card_id');
    }
}
