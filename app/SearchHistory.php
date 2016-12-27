<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class SearchHistory extends Model
{
    protected $table = 'search_history';

    protected $guarded = [
        'id', 'created_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'term', 'user_id', 'created_at',
    ];

    public function user()
    {
        return $this->belongsTo('\App\User', 'user_id');
    }
}
