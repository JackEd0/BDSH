<?php

namespace app;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $guarded = [
        'id', 'created_at',
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'first_name', 'last_name', 'email', 'password', 'address', 'town',
        'postal_code', 'province', 'country', 'phone', 'active', 'user_type_id', 'confirmed',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * Donne le type d'un utilisateur.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userType()
    {
        return $this->hasOne('\App\UserType', 'id');
    }

    public function documentDownload()
    {
        return $this->belongsTo('\App\Document', 'user_id');
    }

    public function transaction()
    {
        return $this->belongsTo('\App\transaction', 'user_id');
    }

    public function searchHistory()
    {
        return $this->belongsTo('\App\SearchHistory', 'user_id');
    }
}
