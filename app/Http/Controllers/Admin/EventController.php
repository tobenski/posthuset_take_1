<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('date', 'asc')->get();

        return view('admin.event.index')->with('events', $events);
    }

    public function create()
    {
        return view('admin.event.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'duration' => 'required|integer',
            'content' => 'required|string',
            'content2' => 'required|string',
            'price' => 'nullable|integer',
            'button_text' => 'nullable|string',
            'button_link' => 'nullable|url',
        ]);

        $validatedData['online'] = $request->online == 'on' ? true : false;

        $event = Event::create($validatedData);

        if($request->image) {
            $event->addMedia($request->image)
                      ->toMediaCollection('event');
        }

        session()->flash('message', 'Event created succesfully!!');

        return redirect()->to(route('admin.event.index'));
    }

    public function show(Event $event)
    {
        return redirect()->to(route('admin.event.edit', $event));
    }

    public function edit(Event $event)
    {
        return view('admin.event.edit')->with('event', $event);
    }

    public function update(Request $request, Event $event)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'date' => 'required|date',
            'time' => 'required',
            'duration' => 'required|integer',
            'content' => 'required|string',
            'content2' => 'required|string',
            'price' => 'nullable|integer',
            'button_text' => 'nullable|string',
            'button_link' => 'nullable|url',
        ]);

        $validatedData['online'] = $request->online == 'on' ? true : false;

        $event->update($validatedData);

        if($request->image) {
            $event->addMedia($request->image)
                      ->toMediaCollection('event');
        }

        session()->flash('message', 'Event updated succesfully!!');

        return redirect()->to(route('admin.event.index'));
    }

    public function destroy(Event $event)
    {
        $event->delete();

        session()->flash('message', 'Event deleted succesfully!!');

        return redirect()->to(route('admin.event.index'));
    }
}
