<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class CardAttribute extends Model
{
    protected $guarded = [
        'id', 'created_at',
    ];

    protected $fillable = [
        'name_fr', 'name_en',
    ];

    public function cardAssociation()
    {
        return $this->belongTo('\App\CardAssociation');
    }
}
