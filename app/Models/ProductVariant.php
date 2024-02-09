<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductVariant extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['product_variant_name', 'product_variant_status', 'product_variant_product_id'];
    

    public function productVariantItems()
    {
        return $this->hasMany(ProductVariantItem::class, 'product_variant_item_product_variant_id');
    }

}
