<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    //
    protected $table = 'user_types';

    protected $guarded = [
        'id', 'created_at',
    ];

    /**
     * Donne tous les utilisateurs d'un type particulier.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function user()
    {
        return $this->belongsTo('\App\User', 'user_id');
    }
}
