<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class LicenceFee extends Model
{
    protected $guarded = [
        'id', 'created_at',
    ];
    protected $fillable = [
        'tvq', 'tps', 'admin', 'private_use', 'public_use',
    ];

    public function transaction()
    {
        return $this->belongsTo('\App\Transaction', 'transaction_id');
    }
}
