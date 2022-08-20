<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id','id');
    }
    public function category(){
        return $this->belongsTo(Category::class, 'category_id','id');
    }
    public function subcategory(){
        return $this->belongsTo(SubCategory::class, 'subcategory_id','id');
    }

    public function store(){
        return $this->belongsTo(Store::class, 'store_id','id');
    }
        
}