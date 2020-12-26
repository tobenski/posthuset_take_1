<?php

namespace App\Http\Livewire;

use App\Models\CateringMenu;
use App\Models\CateringOrder;
use App\Models\Menu;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

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
    public $delivery_city;

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
        // Order
        'order.date' => 'required|date',
        'order.time' => 'required',
        'order.count' => 'required|numeric',
        'order.delivery' => '',
        'order.delivery_name' => 'exclude_if:order.delivery,0|required|string',
        'order.delivery_address' => 'exclude_if:order.delivery,0|required|string',
        'order.delivery_zip' => 'exclude_if:order.delivery,0|required|numeric|between:1000,9999',
        'order.delivery_city' => 'exclude_if:order.delivery, 0|required|string',
        'order.contact_phone' => 'exclude_if:order.delivery,0|required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',

        // User
        'user.name' => 'required|string',
        'user.lastname' => 'required|string',
        'user.company' => 'nullable|string',
        'user.cvr' => 'exclude_if:user.company,null|required|numeric|between:9999999,99999999',
        'user.email' => 'required|email|unique:users,phone',
        'user.password' => 'nullable|string|min:8',
        'user.phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8|unique:users,phone',
        'user.address' => 'required|string',
        'user.zip' => 'required|numeric|between:1000,9999',
        'user.city' => 'required|string',

        // Login
        'email' => 'required|email',
        'password' => 'required|string|min:8',
    ];

    public function updated($propertyName, $value)
    {
        if($propertyName == 'user.email') {
            $user = User::where('email', $value)->first();
            $this->user = $user ? $user : $this->user;
        }
        if($propertyName == 'order.delivery_zip' && $value){
            $this->order->delivery_city = $this->getCity($value);
        }
        if($propertyName == 'user.zip' && $value){
            $this->user->city = $this->getCity($value);
        }
        $this->validateOnly($propertyName);

    }

    public function submitStepOne()
    {
        $this->validate([
            // Order
            'order.date' => 'required|date',
            'order.time' => 'required',
            'order.count' => 'required|numeric',
            'order.delivery' => '',
            'order.delivery_name' => 'exclude_if:order.delivery,0|required|string',
            'order.delivery_address' => 'exclude_if:order.delivery,0|required|string',
            'order.delivery_zip' => 'exclude_if:order.delivery,0|required|numeric|between:1000,9999',
            'order.delivery_city' => 'exclude_if:order.delivery,0|required|string',
            'order.contact_phone' => 'exclude_if:order.delivery,0|required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
        ]);

        $this->next();
    }

    public function submitStepTwo()
    {
        $this->validate([
            // User
            'user.name' => 'required|string',
            'user.lastname' => 'required|string',
            'user.company' => 'nullable|string',
            'user.cvr' => 'exclude_if:user.company,null|required|numeric|between:9999999,99999999',
            'user.email' => 'required|email',
            'user.password' => 'nullable|string|min:8',
            'user.phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
            'user.address' => 'required|string',
            'user.zip' => 'required|numeric|between:1000,9999',
            'user.city' => 'required|string',
        ]);

        if(!$this->user->password){
            $this->user->password = Hash::make('Password');
        }

        $this->user->save();
        $this->order->cateringMenu()->associate($this->menu);
        $this->order->user()->associate($this->user);
        $this->order->save();
    }

    public function login()
    {
        $this->validate([

        ]);
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

    public function addToCart(CateringOrder $order): void
    {
        Cart::add($order);
    }

    private function getCity($zip)
    {
        $response = Http::get('https://dawa.aws.dk/postnumre/' . $zip);
        if ($response->successful()) {
            return json_decode($response->getBody())->navn;
        } else {
            return '';
        }

    }
}
