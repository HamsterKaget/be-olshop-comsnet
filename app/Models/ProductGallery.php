<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductGallery extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'product_galleries';

    protected $fillable = [
        'photos',
        'products_id'
    ];

    protected $hidden = [

    ];

    public function product() {
        return $this->belongsTo(Product::class, 'products_id', 'id');
    }
}
