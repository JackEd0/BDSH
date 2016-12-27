<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class LicenceVersion extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'licence_versions';

    protected $guarded = [
        'id', 'created_at',
    ];
    protected $fillable = [
        'terms',
    ];

    public function transaction()
    {
        return $this->belongsTo('\App\Transaction', 'transaction_id');
    }
}
