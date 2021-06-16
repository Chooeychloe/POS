<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;

class Order extends Component
{   
    public $orders , $products = [], $product_code, $message = '', $productIncart;

    public function mount(){
        $this -> products = Product::all();
        $this -> productIncart = Cart::all();
    }

    public function InserttoCart(){
        $countProduct = Product::where('id', $this->product_code)->first();

        if(!$countProduct){
            return $this -> message ='Product not found';
        }
        
        $countCartProduct = Cart::where('product_id', $this->product_code)->count();

        if($countCartProduct >0){
            return $this -> message ='Product '.$countProduct->product_name. ' already exist, Just add quantity';

        }
        $add_to_cart = new Cart;
        $add_to_cart->product_id = $countProduct->id;
        $add_to_cart->product_qty = 1;
        $add_to_cart->product_price = $countProduct->price;
        $add_to_cart->user_id = auth()->user()->id;
        $add_to_cart->save();
        
        $this->productIncart->prepend($add_to_cart);

        $this->product_code = '';
        return $this->message = "Product added successfully";
    }

    public function removeProduct($cartId){

        $deleteCart =  Cart::find($cartId);
        $deleteCart -> delete();

        $this->message = "Product removed from Cart.";

        $this->productIncart = $this->productIncart -> except($cartId);
    }

    public function render()
    {
        
        return view('livewire.order');
    }
}
