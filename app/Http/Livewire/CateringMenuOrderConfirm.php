<?php

namespace App\Http\Livewire;

use App\Models\CateringMenu;
use App\Models\CateringOrder;
use App\Models\User;
use Livewire\Component;

class CateringMenuOrderConfirm extends Component
{
    public CateringMenu $menu;
    public User $user;
    public CateringOrder $order;

    public function mount()
    {
        $this->order = CateringOrder::find(request()->session()->get('order_id'));
        $this->menu = $this->order->cateringMenu;
        $this->user = $this->order->user;

    }

    public function render()
    {
        return view('livewire.catering-menu-order-confirm');
    }
}
