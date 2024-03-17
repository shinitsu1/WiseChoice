<?php

namespace App\Livewire;

use App\Models\Products;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddProduct extends Component
{
    use WithFileUploads;

    public $product;
    public $base_price;
    public $sell_price;
    public $category;
    public $quantity;
    public $image;
    public $desc;

    public function store()
    {
        $this->validate([
            'product' => 'required|min:2|max:50',
            'base_price' => 'required|min:2|max:50',
            'sell_price' => 'required',
            'quantity' => 'required',
            'category' => 'required',
            'image' => 'required|image|max:1024',
            'desc' => 'required',
        ]);

        if($this->image){
            $fileName = 'WS_' . $this->product .'.jpg';

            $this->image = $this->image->storeAs('images', $fileName, 'public');

            $this->image = 'storage/'.$this->image;
        }

        Products::create([
            'product' => $this->product,
            'base_price' => $this->base_price,
            'sell_price' => $this->sell_price,
            'quantity' => $this->quantity,
            'category' => $this->category,
            'image' => $this->image,
            'sold' => 0,
            'desc'=> $this->desc,
        ]);

        session()->flash('message', 'Product Added.');
        return redirect()->route('add');
    }

    public function render()
    {
        return view('livewire.add-product');
    }
}
