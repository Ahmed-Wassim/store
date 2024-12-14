<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderItem extends Pivot
{
    public $incrementing = true;

    public $table = 'order_items';

    public function product()
    {
        return $this->belongsTo(Product::class)->withDefault([
            'name' => $this->product_name,
        ]);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
