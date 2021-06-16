<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Order extends Component
{   
    public $orders ='', $products = [], $product_code, $message = '';

    public function mount(){
        $this -> products = Product::all();
    }

    public function InserttoCart(){
        $countProduct = Product::where('id'. $this->product_code)->get();

        if(!$countProduct){
            return $this -> message ='Product not found.';
        }
        
        
        dd($countProduct);
    }

    public function render()
    {
        
        return view('livewire.order');
    }
}
