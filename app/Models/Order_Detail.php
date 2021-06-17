<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order_Detail extends Model
{
    use HasFactory;

    protected $table = 'order_details';
    protected $fillable = ['order_id', 'product_id', 'unitprice','quantity', 'amount', 'discount'];

    public function product(){
        return $this->belongsTo('App\Models\Product');
    }
    public function order(){
        return $this->belongsTo('App\Models\Order');
    }
}
