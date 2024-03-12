<?php

namespace App\Livewire;

use App\Models\Orders;
use Livewire\Component;

class EditDashboard extends Component
{
    public function render()
    {
        $earnings = Orders::sum('earnings');
        return view('livewire.edit-dashboard',[
            'earnings' => $earnings,
        ]);
    }
}
