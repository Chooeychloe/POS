<?php

namespace App\Models;

use App\Models\Order_Detail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = ['name','phone'];

    public function orderdetail(){
        return $this->hasMany('App\Models\Order_Detail');
    } 
}
