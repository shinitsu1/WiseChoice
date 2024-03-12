<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Livewire\Component;

class ProductList extends Component
{
    use WithFileUploads;

    public $sell_price;
    public $product;
    public $quantity;
    public $qty = 1;
    public $image;
    public $id;
    public $total_price;
    public $sold;
    public $minus;

    public function store($id){
        $product = Products::findOrFail($id);
        $this->image = $product->image;
        $this->quantity = $product->quantity;
        $this->product = $product->product;
        $this->sell_price = $product->sell_price;
        $this->total_price = $this->qty * $product->sell_price;
        $this->sold = $this->quantity - $this->qty;
        // $validate = Cart::where('product', $this->product);

        // if($validate){
        //     session()->flash('message', 'This Product is Already Added to your Cart.');
        // }
        // else{
            Cart::create([
                'user_id' => Auth::User()->id,
                'image' => $this->image,
                'quantity' => $this->qty,
                'product' => $this->product,
                'sell_price' =>$this->sell_price,
                'total_price' =>$this->total_price,
            ]);

            $this->minus = $this->quantity - $this->sold;

            $product->update([
                'quantity' => $this->sold,
                'sold' => $this->minus,
            ]);


            session()->flash('message', 'Product Added to Cart.');
            return redirect()->route('category');

        // }
    }

    public function render()
    {
        $products = Products::latest()->get();

        return view('livewire.product-list',[
            'products' => $products
        ]);
    }
}
