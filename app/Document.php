<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $guarded = [
        'id', 'created_at',
    ];
    protected $fillable = [
        'file_name', 'card_id'
    ];

    public function card()
    {
        return $this->belongTo('\App\Card');
    }
}
