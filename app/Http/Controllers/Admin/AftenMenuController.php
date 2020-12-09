<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AftenMenu;
use App\Models\MenuType;
use Illuminate\Http\Request;

class AftenMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aftenMenuer = AftenMenu::all();

        return view('admin.aftenmenu.index')->with('menuer', $aftenMenuer);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.aftenmenu.create');
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

        $menu = AftenMenu::create($validatedData);

        session()->flash('message', 'Aftenmenu created successfully!!');

        return redirect()->to(route('admin.aftenMenu.edit', $menu));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AftenMenu  $aftenMenu
     * @return \Illuminate\Http\Response
     */
    public function show(AftenMenu $aftenMenu)
    {
        return redirect()->to(route('admin.aftenMenu.edit', $aftenMenu));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AftenMenu  $aftenMenu
     * @return \Illuminate\Http\Response
     */
    public function edit(AftenMenu $aftenMenu)
    {
        $menuTypes = MenuType::all();

        return view('admin.aftenmenu.edit')->with(['menu' => $aftenMenu, 'menuTypes' => $menuTypes ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AftenMenu  $aftenMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AftenMenu $aftenMenu)
    {
        $validatedData = $request->validate([
            'firstday' => 'required|date',
            'lastday' => 'required|date|after:firstday',
            'timeframe' => 'required|string',
            'comment' => 'nullable|string',
        ]);

        $validatedData['online'] = $request->online == 'on' ? true : false;

        if($request->image) {
            $aftenMenu->addMedia($request->image)
                      ->toMediaCollection('menu');
        }

        $aftenMenu->update($validatedData);

        session()->flash('message', 'Aftenmenu uopdated successfully!!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AftenMenu  $aftenMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(AftenMenu $aftenMenu)
    {
        foreach ($aftenMenu->retter as $ret) {
            $ret->delete();
        }
        $aftenMenu->delete();

        session()->flash('message', 'Aftenmenu deleted succsfully!!');

        return redirect()->to(route('admin.aftenMenu.index'));
    }
}
