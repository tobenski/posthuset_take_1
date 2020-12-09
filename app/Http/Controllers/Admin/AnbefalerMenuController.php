<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnbefalerMenu;
use App\Models\MenuType;
use Illuminate\Http\Request;

class AnbefalerMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $anbefalerMenuer = AnbefalerMenu::all();

         return view('admin.anbefalermenu.index')->with('anbefalerMenuer', $anbefalerMenuer);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.anbefalermenu.create');
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

        $menu = AnbefalerMenu::create($validatedData);

        session()->flash('message', 'Anbefalermenu created succesfully!!');

        return redirect()->to(route('admin.anbefalerMenu.edit', $menu));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnbefalerMenu  $anbefalerMenu
     * @return \Illuminate\Http\Response
     */
    public function show(AnbefalerMenu $anbefalerMenu)
    {
        return view('admin.anbefalermenu.edit')->with('anbefalerMenu', $anbefalerMenu);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnbefalerMenu  $anbefalerMenu
     * @return \Illuminate\Http\Response
     */
    public function edit(AnbefalerMenu $anbefalerMenu)
    {
        $menuTypes = MenuType::all();
        return view('admin.anbefalermenu.edit')->with(['anbefalerMenu' => $anbefalerMenu, 'menuTypes' => $menuTypes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnbefalerMenu  $anbefalerMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AnbefalerMenu $anbefalerMenu)
    {
        $validatedData = $request->validate([
            'firstday' => 'required|date',
            'lastday' => 'required|date|after:firstday',
            'timeframe' => 'nullable|string',
            'comment' => 'nullable|string',
        ]);

        $validatedData['online'] = $request->online == 'on' ? true : false;

        if($request->image) {
            $anbefalerMenu->addMedia($request->image)
                          ->toMediaCollection('menu');
        }
        $anbefalerMenu->update($validatedData);

        session()->flash('message', 'Anbefalermenu updated succesfully!!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnbefalerMenu  $anbefalerMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnbefalerMenu $anbefalerMenu)
    {
        foreach ($anbefalerMenu->retter as $ret)
        {
            $ret->delete();
        }
        $anbefalerMenu->delete();

        session()->flash('message', 'Anbefalermenu deleted successfully!!');

        return redirect()->to(route('admin.anbefalerMenu.index'));
    }
}
