<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'collections';

    protected $guarded = [
        'id', 'created_at',
    ];

    protected $fillable = [
        'code', 'name', 'state',
    ];

    public function card()
    {
        return $this->belongsTo('App\Card', 'id');
    }
}
