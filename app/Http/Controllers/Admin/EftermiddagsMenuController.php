<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EftermiddagsMenu;
use Illuminate\Http\Request;

class EftermiddagsMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eftermiddagsMenuer = EftermiddagsMenu::all();
        return view('admin.eftermiddagsmenu.index')->with('eftermiddagsmenuer', $eftermiddagsMenuer);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.eftermiddagsmenu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firstday' => 'required|date',
            'lastday' => 'required|date|after:firstday',
            'timeframe' => 'nullable|string',
            'comment' => 'nullable|string',
            'image' => '',
        ]);

        $validatedData['online'] = $request->online == 'on' ? true : false;

        $menu = EftermiddagsMenu::create($validatedData);

        session()->flash('message', 'Eftermiddagsmenu created succesfully!!');

        return redirect()->to(route('admin.eftermiddagsmenu.edit', $menu));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EftermiddagsMenu  $eftermiddagsMenu
     * @return \Illuminate\Http\Response
     */
    public function show(EftermiddagsMenu $eftermiddagsMenu)
    {
        return view('admin.eftermiddagsmenu.show')->with('eftermiddagsmenu', $eftermiddagsMenu);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EftermiddagsMenu  $eftermiddagsMenu
     * @return \Illuminate\Http\Response
     */
    public function edit(EftermiddagsMenu $eftermiddagsMenu)
    {
        return view('admin.eftermiddagsmenu.edit')->with('eftermiddagsmenu', $eftermiddagsMenu);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EftermiddagsMenu  $eftermiddagsMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EftermiddagsMenu $eftermiddagsMenu)
    {
        $validatedData = $request->validate([
            'firstday' => 'required|date',
            'lastday' => 'required|date|after:firstday',
            'timeframe' => 'nullable|string',
            'comment' => 'nullable|string',
        ]);

        $validatedData['online'] = $request->online == 'on' ? true : false;

        if($request->image) {
            $eftermiddagsMenu->addMedia($request->image)
                        ->toMediaCollection('menu');
        }

        $eftermiddagsMenu->update($validatedData);

        session()->flash('message', 'Eftermiddagsmenu updated succesfully!!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EftermiddagsMenu  $eftermiddagsMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(EftermiddagsMenu $eftermiddagsMenu)
    {
        foreach ($eftermiddagsMenu->retter as $ret) {
            $ret->delete();
        }
        $eftermiddagsMenu->delete();

        session()->flash('message', 'Eftermiddags menu deleted succesfully!!');

        return redirect()->to(route('admin.eftermiddagsMenu.index'));
    }
}
