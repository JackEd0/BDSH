<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $guarded = [
        'id', 'created_at',
    ];
    protected $fillable = [
        'file_name', 'card_id',
    ];

    public function card()
    {
        return $this->hasOne('\App\Card', 'id');
    }

    public function documentDownload()
    {
        return $this->belongsTo('\App\DocumentDownload', 'document_id');
    }

    public function transactionDocument()
    {
        return $this->belongsTo('\App\TransactionDocument', 'document_id');
    }
}
