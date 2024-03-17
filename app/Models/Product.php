<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function brands(){
        return $this->belongsTo(Brand::class, 'product_brand_id');
    }

    public function FlashSellItem(){
        return $this->hasMany(FlashSellItem::class);
    }

    public function category(){
        return $this->belongsTo(Category::class, 'product_category_id');
    }

    public function productImageGallery(){
        return $this->hasMany(ProductImageGallery::class, 'product_image_gallery_product_id');
    }

    public function productVariants()
    {
        return $this->hasMany(ProductVariant::class, 'product_id');
    }

    // public function productVariantItem(){
    //     return $this->hasMany();
    // }
    
    
    

    
 
}
