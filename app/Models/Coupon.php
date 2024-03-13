<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable = [
        'coupon_name',
        'coupon_code',
        'max_use',
        'quantity',
        'start_date',
        'end_date',
        'discount_type',
        'discount_value',
        'status',
    ];
}
