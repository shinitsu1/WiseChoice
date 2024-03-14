<?php

namespace App\Livewire;

use App\Models\Products;
use Livewire\Component;

class EditProductList extends Component
{
    public $editProductId;
    public $editProductName;
    public $productId;

    public $product;
    public $base_price;
    public $sell_price;
    public $quantity;


    public function delete($productId)
    {
        Products::findOrFail($productId)->delete();
        session()->flash('message', 'Product deleted Successfully.');
    }

    public function edit($productId)
    {
        $this->editProductId = $productId;
        $product = Products::find($productId);
        $this->product = $product->product;
        $this->base_price = $product->base_price;
        $this->sell_price = $product->sell_price;
        $this->quantity = $product->quantity;
    }

    public function cancel()
    {
        $this->reset('editProductId','product','base_price','sell_price', 'quantity');
    }

    public function update()
    {
        $product = Products::find($this->editProductId);
        $product->update([
            'product' => $this->product,
            'base_price' => $this->base_price,
            'sell_price' => $this->sell_price,
            'quantity' => $this->quantity,
        ]);

        $this->cancel();
        session()->flash('message', 'Product updated Successfully.');

    }


    public function render()
    {
        $products = Products::all();



        return view('livewire.edit-product-list',[
            'products' => $products,
        ]);
    }
}
