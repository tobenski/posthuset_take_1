<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FrokostMenu;
use Illuminate\Http\Request;

class FrokostMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $frokostMenuer = FrokostMenu::all();

        return view('admin.frokostmenu.index')->with('frokostmenuer', $frokostMenuer);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.frokostmenu.create');
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

        $menu = FrokostMenu::create($validatedData);

        session()->flash('message', 'Frokostmenu created succesfully!!');

        return redirect()->to(route('admin.frokostmenu.edit', $menu));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FrokostMenu  $frokostMenu
     * @return \Illuminate\Http\Response
     */
    public function show(FrokostMenu $frokostmenu)
    {
        return view('admin.frokostmenu.show')->with('frokostmenu', $frokostmenu);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FrokostMenu  $frokostMenu
     * @return \Illuminate\Http\Response
     */
    public function edit(FrokostMenu $frokostmenu)
    {
        return view('admin.frokostmenu.edit')->with('frokostmenu', $frokostmenu);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FrokostMenu  $frokostMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FrokostMenu $frokostmenu)
    {
        $validatedData = $request->validate([
            'firstday' => 'required|date',
            'lastday' => 'required|date|after:firstday',
            'timeframe' => 'nullable|string',
            'comment' => 'nullable|string',
        ]);

        $validatedData['online'] = $request->online == 'on' ? true : false;

        if($request->image) {
            $frokostmenu->addMedia($request->image)
                        ->toMediaCollection('menu');
        }

        $frokostmenu->update($validatedData);

        session()->flash('message', 'Frokostmenu updated succesfully!!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FrokostMenu  $frokostMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(FrokostMenu $frokostmenu)
    {
        $frokostmenu->delete();

        session()->flash('message', 'Frokostmenu deletet succesfully!!');

        return redirect()->to(route('admin.frokost.index'));
    }
}
