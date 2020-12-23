<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Calendar;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        $dates = Calendar::where('date', '>=', Carbon::now())->orderBy('date', 'asc')->get();

        return view('admin.calendar.index')->with('dates', $dates);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
        ]);

        $validatedData['closed'] = $request->closed == 'on' ? true : false;


        Calendar::create($validatedData);

        return redirect()->back();
    }

    public function destroy(Calendar $calendar)
    {
        $calendar->delete();

        return redirect()->to(route('admin.calendar.index'));
    }
}
