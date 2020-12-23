<?php

namespace App\Http\Livewire;

use App\Models\CateringOrder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CateringMenuOrder extends Component
{
    public CateringOrder $order;
    public User $user;
    public $currentStep = 1;
    public $email;
    public $password;
    public $remember;

    public function mount(Request $request)
    {
        $this->order = new CateringOrder;
        $this->user = new User;
        $this->order->date = Carbon::createFromFormat('d/m-Y', $request->date)->hour(0)->minute(0)->second(0);
        $this->order->count = $request->antal;
        $this->order->catering_menu_id = $request->menu_id;
    }

    public function render()
    {
        return view('livewire.catering-menu-order');
    }

    protected $rules = [
        'order.date' => 'required|date_format:d/m-Y',
    ];

    public function next()
    {
        $this->currentStep++;
    }

    public function back()
    {
        $this->currentStep--;
    }

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if(Auth::attempt(array('email' => $this->email, 'password' => $this->password))){
            $this->user = Auth::user();

            session()->flash('message', "You are Login successful.");
        }else{
            session()->flash('login', 'email and/or password are wrong.');
        }

        $this->next();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

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
