<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    public function product_category()
    {
        return $this->belongsTo('App\Models\Product_category');
    }

    public function product_subcategory()
    {
        return $this->belongsTo('App\Models\Product_subcategory');
    }

    public function getCategoryName()
    {
        return $this->product_category->name;
    }

    public function getSubcategoryName()
    {
        return $this->product_subcategory->name;
    }
}
