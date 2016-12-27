<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    protected $guarded = [
        'id', 'created_at',
    ];

    protected $fillable = [
        'user_id', 'licence_type_id', 'licence_version_id', 'licence_fee_id', 'licence_owner_id', 'price_type_id',
        'accepted_date', 'refusal_date', 'paid_date', 'comment_user', 'comment_admin', 'cancelled_date', 'paypal_id', 'payer_email', 'created_at',
    ];

    public function licenceType()
    {
        return $this->hasOne('\App\LicenceType', 'id');
    }

    public function transactionDocument()
    {
        return $this->belongsTo('\App\TransactionDocument', 'transaction_document_id');
    }

    public function user()
    {
        return $this->hasOne('\App\User', 'id');
    }

    public function licenceOwner()
    {
        return $this->hasOne('\App\LicenceOwner', 'id');
    }

    public function licenceFee()
    {
        return $this->hasOne('\App\LicenceFee', 'id');
    }

    public function licenceVersion()
    {
        return $this->hasOne('\App\LicenceVersion', 'id');
    }

    public function licenceResponse()
    {
        return $this->belongsTo('\App\LicenceResponse', 'licence_response_id');
    }
}
