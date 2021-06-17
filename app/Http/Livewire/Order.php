<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;

class Order extends Component
{   
    public $orders , $products = [], $product_code, $message = '', $productIncart;

    public $pay_money ,$balance;


    public function mount(){
        $this -> products = Product::all();
        $this -> productIncart = Cart::all();
    }

    public function IncrementQty($cartId){
       
       $carts = Cart::find($cartId);
       $carts->increment('product_qty',1);

       $updatePrice =  $carts->product_qty* $carts->product->price;

       $carts->update(['product_price' => $updatePrice]);
       $this->mount();
    }

    public function DecrementQty($cartId){

        $carts = Cart::find($cartId);
        if($carts->product_qty == 1){
            return session()->flash('info', 'Product ' . $carts->product->product_name. ' quantity cannot be less than 1.');
        }
       $carts->decrement('product_qty',1);

       $updatePrice =  $carts->product_qty* $carts->product->price;

       $carts->update(['product_price' => $updatePrice]);
       $this->mount();
    }

    public function InserttoCart(){
        $countProduct = Product::where('id', $this->product_code)->first();

        if(!$countProduct){
            return session()->flash('error', 'Product not found! Please input the right product code.');

            // return $this -> message ='Product not found! Please input the right product code.';
        }
        
        $countCartProduct = Cart::where('product_id', $this->product_code)->count();

        if($countCartProduct >0){
            return session()->flash('error', 'Product '.$countProduct->product_name. ' already exist. Just add quantity.');
            // return $this -> message ='Product '.$countProduct->product_name. ' already exist. Just add quantity.';

        }
        $add_to_cart = new Cart;
        $add_to_cart->product_id = $countProduct->id;
        $add_to_cart->product_qty = 1;
        $add_to_cart->product_price = $countProduct->price;
        $add_to_cart->user_id = auth()->user()->id;
        $add_to_cart->save();
        
        $this->productIncart->prepend($add_to_cart);

        $this->product_code = '';
        return session()->flash('success', 'Product added successfully.');

        // return $this->message = "Product added successfully.";
    }

    public function removeProduct($cartId){

        $deleteCart =  Cart::find($cartId);
        $deleteCart -> delete();

        return session()->flash('error', 'Product removed from the list.');
        // $this->message = "Product removed from Cart.";

        $this->productIncart = $this->productIncart -> except($cartId);
    }

    public function render()
    {

        if($this->pay_money != ''){
            $totalAmount = $this->pay_money - $this->productIncart->sum('product_price');
            $this->balance = $totalAmount;
        }

        return view('livewire.order');
    }
}
