<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use SoftDeletes;

    public function member()
    {
        return $this->belongsTo('App\Models\Member');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function getMemberNickname()
    {
        return $this->member->nickname;
    }

    public function getProductImage1()
    {
        return $this->product->image_1;
    }

    public function getProductCategoryId()
    {
        return $this->product->product_category_id;
    }
    
    public function getProductSubcategoryId()
    {
        return $this->product->product_subcategory_id;
    }
        
    public function getName()
    {
        return $this->product->name;
    }
}
