<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    use HasFactory;
    protected $table = "table_order_detail";

    public function produk() {
        return $this->belongsTo(Produk::class, 'produk_id', 'id')->with('brand');
    }
}
