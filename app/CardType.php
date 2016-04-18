<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class CardType extends Model
{
    protected $guarded = [
        'id', 'created_at',
    ];

    protected $fillable = [
        'name_fr', 'name_en',
    ];

    public function card()
    {
        return $this->belongTo('\App\Card');
    }
}
