<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class LicenceOwner extends Model
{
    protected $table = 'licence_owners';
    protected $guarded = [
        'id', 'created_at',
    ];
    protected $fillable = [

        'last_name', 'first_name', 'enterprise', 'email', 'address', 'town',
        'postal_code', 'province', 'country', 'phone', 'updated_at',
    ];

    public function transaction()
    {
        return $this->belongsTo('\App\Transaction', 'transaction_id');
    }
}
