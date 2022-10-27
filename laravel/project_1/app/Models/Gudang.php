<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    use HasFactory;
    protected $table = "table_gudang";

    public function produk() {
        // return $this->hasMany(Produk::class, 'gudang_id', 'id')
        //             ->belongsTo(Brand::class, 'brand_id', 'id');
        return $this->hasMany(Produk::class, 'gudang_id', 'id')
                    ->with('brand:id,nama_brand');
    }

    // public function brand() {
    //     return $this->belongsTo(Brand::class, 'brand_id');
    // }
}
