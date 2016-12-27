<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class DocumentDownload extends Model
{
    protected $guarded = [
        'id', 'created_at',
    ];
    protected $fillable = [
        'document_id', 'user_id', 'comment',
    ];

    public function document()
    {
        return $this->hasOne('\App\Document', 'id');
    }

    public function user()
    {
        return $this->hasOne('\App\User', 'id');
    }
}
