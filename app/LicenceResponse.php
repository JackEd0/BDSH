<?php
/**
 * Created by PhpStorm.
 * User: Khaldi
 * Date: 25/10/2016
 * Time: 10:27.
 */

namespace app;

use Illuminate\Database\Eloquent\Model;

class LicenceResponse extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'licence_responses';

    protected $guarded = [
        'id', 'created_at',
    ];
    protected $fillable = [
        'transaction_id', 'licence_attribute_id', 'value',
    ];

    public function transaction()
    {
        return $this->hasOne('\App\Transaction', 'id');
    }

    public function licenceAttribute()
    {
        return $this->hasOne('\App\LicenceAttribute', 'id');
    }
}
