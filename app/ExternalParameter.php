<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class ExternalParameter extends Model
{
    protected $table = 'external_parameters';
    protected $guarded = [
        'id', 'created_at',
    ];
    protected $fillable = [
        'email',
    ];
}
