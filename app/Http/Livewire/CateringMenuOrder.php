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
    public $total;

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
        'order.date' => 'required|date',
        'order.time' => 'required',
        'order.count' => 'required|numeric',
        'order.delivery' => '',
        'order.delivery_name' => 'exclude_if:order.delivery,0|required|string',
        'order.delivery_address' => 'exclude_if:order.delivery,0|required|string',
        'order.delivery_zip' => 'exclude_if:order.delivery,0|required|numeric|between:1000,9999',
        'order.contact_phone' => 'exclude_if:order.delivery,0|required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function next()
    {
        $this->currentStep++;
    }

    public function back()
    {
        $this->currentStep--;
    }

    public function gotoStep($step)
    {
        if($step < $this->currentStep) {
            $this->currentStep = $step;
        }

    }

    public function increment()
    {
        $this->order->count++;
    }

    public function decrement()
    {
        $this->order->count--;
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
