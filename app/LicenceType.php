<?php
/**
 * Created by PhpStorm.
 * User: Khaldi
 * Date: 25/10/2016
 * Time: 10:27.
 */

namespace app;

use Illuminate\Database\Eloquent\Model;

class LicenceType extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'licence_types';

    protected $guarded = [
        'id', 'created_at',
    ];
    protected $fillable = [
        'name_fr', 'name_en',
    ];

    public function transaction()
    {
        return $this->belongsTo('\App\Transaction', 'licence_type_id');
    }

    public function licenceAttributeType()
    {
        return $this->belongsTo('\App\LicenceAttributeType', 'licence_type_id');
    }
}
