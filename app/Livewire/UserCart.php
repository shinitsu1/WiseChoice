<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Orders;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserCart extends Component
{

    public $quantity;
    public $sell_price;
    public $total_price;
    public $editOrderId;
    public $cartId;
    public $user_name;
    public $user_id;
    public $status;
    public $payment; //payment method (cod/g cash)
    public $to_pay;


    public function store()
    {
        $user = Auth::User()->id;
        $grand_total = Cart::where('user_id',$user)->sum('total_price');

        $this->user_name = Auth::user()->name;
        $this->user_id = Auth::user()->id;
        $this->status = 'Pending';
        $this->payment = 'Cash On Delivery';
        $this->to_pay = $grand_total;

        Orders::create([
            'user_id' => $this->user_id,
            'user_name' => $this->user_name,
            'status' => $this->status,
            'payment' => $this->payment,
            'grand_total' => $this->to_pay,
            'earnings' => 0,
            'received' => '- - -',
        ]);
        

        Cart::where('user_id',$user)->delete();
        session()->flash('message', 'Your Order has been processed.');
        return redirect()->route('order-list');

    }
    public function cancel()
    {
        $this->reset('editOrderId','sell_price', 'quantity','total_price');
    }
    public function edit($cartId)
    {
        $this->editOrderId = $cartId;//to open the input box

        $product = Cart::find($cartId);
        $this->quantity = $product->quantity;   //from database to label or input?
        $this->sell_price = $product->sell_price;
    }
    public function update()
    {
        $product = Cart::find($this->editOrderId);

        $total_price = $this->quantity * $this->sell_price;
        $this->total_price = $total_price;

        $product->update([
            'quantity' => $this->quantity,
            'sell_price' => $this->sell_price,
            'total_price' => $this->total_price,
        ]);

        $this->cancel();
        session()->flash('message', 'Product Edited Successfully.');
    }
    public function delete($cartId)
    {
        Cart::findOrFail($cartId)->delete();
        session()->flash('message', 'Product deleted from the Cart.');

    }
    public function deleteAll()
    {
        $user = Auth::User()->id;
        Cart::where('user_id',$user)->delete();
        session()->flash('message', 'Products deleted from the Cart.');
    }
    public function render()
    {
        $user = Auth::User()->id;

        $cart = Cart::where('user_id',$user)->get();
        $user_cart = Cart::where('user_id',$user)->count();
        $grand_total = Cart::where('user_id',$user)->sum('total_price');

        return view('livewire.user-cart',[
            'cart' => $cart,
            'user_cart' => $user_cart,
            'grand_total' => $grand_total
        ]);
    }
}
