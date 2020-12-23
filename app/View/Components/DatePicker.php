<?php

namespace App\View\Components;

use App\Models\Calendar;
use Carbon\Carbon;
use Illuminate\View\Component;
use Illuminate\View\View;

class DatePicker extends Component
{
    public $closedDates;
    public $closedWeekendDates = [];
    public $menu;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($menu)
    {
        $this->menu = $menu;
        $this->closedDates = Calendar::where('date', '>=', Carbon::now())->where('closed', true)->get();
        for ($i=0; $i < 365; $i++) {
            $day = Carbon::now()->addDays($i);
            if(($day->dayOfWeekIso == 1 || $day->dayOfWeekIso == 7) && count(Calendar::where('date', $day)->where('closed', false)->get()) == 0) {
                array_push($this->closedWeekendDates, $day);
            }
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {

        return view('components.date-picker');
    }
}
