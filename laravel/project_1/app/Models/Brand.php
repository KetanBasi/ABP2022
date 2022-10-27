<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    use HasFactory;
    protected $table = "table_brand";

    public function produk() {
        // return $this->hasMany(Produk::class, 'brand_id', 'id')
        //             ->with('gudang:id,nama_gudang');
        return $this->hasManyThrough(Gudang::class, Produk::class,
                                    'brand_id', 'id', 'id', 'gudang_id');
    }
}
