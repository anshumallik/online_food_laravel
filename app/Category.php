<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name' ,'description' ,'image'
    ];


    public function subcategories()
    {
        return $this->hasMany(Category::class);
    }
    public function sub_subcategories()
    {
        return $this->hasMany(Category::class);
    }

}
