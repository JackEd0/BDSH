<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class CardAttributeType extends Model
{
    protected $guarded = [
        'id', 'created_at',
    ];
    protected $fillable = [
        'value', 'card_type_id', 'card_attribute_id',
    ];

    public function card()
    {
        return $this->hasMany('\App\CardType');
    }

    public function cardAttribute()
    {
        return $this->hasMany('\App\CardAttribute');
    }
}
