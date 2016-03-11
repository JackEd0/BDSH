<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [
        'id', 'created_at'
    ];

    public function posts () {
        return $this->hasMany('Post');
    }

    /*
     * va permettre de retrouver toutes les posts de la catégorie 'id'
     * $category = Category::find(id)->posts();
    */
}
