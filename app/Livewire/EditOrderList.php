<?php

namespace App\Livewire;

use App\Models\Orders;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditOrderList extends Component
{
    public $grand_total;

    public function update($cartId)
    {
       $update = Orders::findOrFail($cartId);
       $this->grand_total = $update->grand_total;
       $update->update([
            'status' => 'Paid',
            'earnings' => $this->grand_total,
            'received' => now(),
       ]);
       session()->flash('message', 'Thank you for ordering!.');

    }

    public function delete($orderId)
    {
        Orders::findOrFail($orderId)->delete();
        session()->flash('message', 'Order canceled.');
    }

    public function render()
    {
        if(Auth::user()->role == 'admin' )
        {
            $orders = Orders::latest()->get();
            return view('livewire.edit-order-list',[
                'orders' => $orders
            ]);
        }
        else
        {
            $user = Auth::User()->id;
            $orders = Orders::latest()->where('user_id', $user)->get();
            return view('livewire.edit-order-list',[
                'orders' => $orders
            ]);
        }
    }
}
