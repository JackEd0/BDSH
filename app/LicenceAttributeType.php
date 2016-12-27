<?php
/**
 * Created by PhpStorm.
 * User: Khaldi
 * Date: 25/10/2016
 * Time: 10:27.
 */

namespace app;

use Illuminate\Database\Eloquent\Model;

class LicenceAttributeType extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'licence_attributes_types';

    protected $guarded = [
        'id', 'created_at',
    ];
    protected $fillable = [
        'licence_type_id', 'licence_attribute_id',
    ];

    public function licenceAttribute()
    {
        return $this->hasOne('\App\LicenceAttribute', 'id');
    }

    public function licenceType()
    {
        return $this->hasOne('\App\LicenceType', 'id');
    }
}
