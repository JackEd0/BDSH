<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class CardAssociation extends Model
{
    protected $guarded = [
        'id', 'created_at',
    ];
    protected $fillable = [
        'value', 'card_id', 'card_attribute_id',
    ];

    public function card()
    {
        return $this->hasOne('\App\Card', 'id');
    }

    public function cardAttribute()
    {
        return $this->hasOne('\App\CardAttribute', 'id');
    }
}
