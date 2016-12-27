<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class CardAttributeType extends Model
{
    protected $guarded = [
        'id', 'created_at',
    ];
    protected $fillable = [
        'value', 'card_type_id', 'card_attribute_id', 'position',
    ];

    public function cardType()
    {
        return $this->hasOne('\App\CardType', 'id');
    }

    public function cardAttribute()
    {
        return $this->hasOne('\App\CardAttribute', 'id');
    }
}
