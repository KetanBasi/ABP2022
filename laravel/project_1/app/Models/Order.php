<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "table_order";

    // public function detail() {
    //     return $this->belongsTo(Order_detail::class, 'order_id', 'id')->with('produk');
    // }
}
