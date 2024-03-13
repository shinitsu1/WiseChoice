<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Orders;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class GcashToPay extends Component
{
    public $user_name;
    public $user_id;
    public $status;
    public $payment;
    public $to_pay;

    public function pay()
    {
        $user = Auth::User()->id;
        $grand_total = Cart::where('user_id',$user)->sum('total_price');

        $this->user_name = Auth::user()->name;
        $this->user_id = Auth::user()->id;
        $this->status = 'Paid';
        $this->payment = 'Via GCash';
        $this->to_pay = $grand_total;

        Orders::create([
            'user_id' => $this->user_id,
            'user_name' => $this->user_name,
            'status' => $this->status,
            'payment' => $this->payment,
            'grand_total' => $this->to_pay,
            'earnings' => $this->to_pay,
            'received' => now(),
        ]);


        Cart::where('user_id',$user)->delete();
        session()->flash('message', 'Your Order has been processed.');
        return redirect()->route('order-list');
    }
    public function render()
    {
        $user = Auth::User()->id;
        $grand_total = Cart::where('user_id',$user)->sum('total_price');
        return view('livewire.gcash-to-pay',[
            'grand_total' => $grand_total
        ]);
    }
}
