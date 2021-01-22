<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product_category extends Model
{
    use SoftDeletes;

    public function subcategories()
    {
        return $this->hasMany('App\Models\Product_subcategory');
    }
}
