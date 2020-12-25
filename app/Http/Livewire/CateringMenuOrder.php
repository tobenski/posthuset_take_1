<?php

namespace App\Http\Livewire;

use App\Models\CateringMenu;
use App\Models\CateringOrder;
use App\Models\Menu;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CateringMenuOrder extends Component
{
    public CateringOrder $order;
    public CateringMenu $menu;
    public User $user;
    public $currentStep = 1;
    public $email;
    public $password;
    public $remember;

    public function mount(Request $request)
    {
        $this->order = new CateringOrder;
        $this->user = new User;
        $this->order->date = Carbon::createFromFormat('d-m-Y', $request->date)->hour(0)->minute(0)->second(0);
        $this->order->time = Carbon::now()->hour(11)->minute(30)->second(0);
        $this->order->count = $request->antal;
        $this->order->delivery = 0;
        $this->menu = CateringMenu::where('id', $request->menu_id)->first();
        $this->order->cateringMenu = $this->menu;
    }

    public function render()
    {
        return view('livewire.catering-menu-order');
    }

    protected $rules = [
        'order.date' => 'required|date_format:d-m-Y',
        'order.time' => 'required|date_format:H:i',
        'order.count' => 'required|numberic',
        'order.delivery' => '',
    ];

    public function next()
    {
        $this->currentStep++;
    }

    public function back()
    {
        $this->currentStep--;
    }


    public function submitOrder()
    {
        // $this->order->save();
        // tilføj observer/hook to send confirmation email

        $this->clearForm();
    }

    public function clearForm()
    {
        $this->currentStep = 1;
    }
}
