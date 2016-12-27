<?php
/**
 * Created by PhpStorm.
 * User: Khaldi
 * Date: 25/10/2016
 * Time: 10:27.
 */

namespace app;

use Illuminate\Database\Eloquent\Model;

class TransactionDocument extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'transactions_documents';

    protected $guarded = [
        'id', 'created_at',
    ];
    protected $fillable = [
        'document_id', 'transaction_id',
    ];

    public function document()
    {
        return $this->hasOne('\App\Document', 'id');
    }

    public function transaction()
    {
        return $this->hasOne('\App\Transaction', 'id');
    }
}
