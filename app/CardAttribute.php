<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class CardAttribute extends Model
{
    protected $guarded = [
        'id', 'created_at',
    ];

    protected $fillable = [
        'name_fr', 'name_en', 'hide_if_empty', 'user_permit_level',
    ];

    public function cardAssociation()
    {
        return $this->belongsTo('\App\CardAssociation', 'card_attribute_id');
    }

    public function cardAttributeType()
    {
        return $this->belongsTo('\App\CardAttributeType', 'card_attribute_id');
    }
}
