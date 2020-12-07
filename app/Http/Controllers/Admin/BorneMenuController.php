<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BorneMenu;
use Illuminate\Http\Request;

class BorneMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $borneMenuer = BorneMenu::all();

        return view('admin.bornemenu.index')->with('bornemenuer', $borneMenuer);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bornemenu.create');
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
            'timeframe' => 'nullable|string',
            'comment' => 'nullable|string',
            'image' => '',
        ]);

        $validatedData['online'] = $request->online == 'on' ? true : false;

        $menu = BorneMenu::create($validatedData);

        session()->flash('message', 'Børnemenu created successfully!!');

        return redirect()->to(route('admin.borneMenu.edit', $menu));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BorneMenu  $borneMenu
     * @return \Illuminate\Http\Response
     */
    public function show(BorneMenu $borneMenu)
    {
        return view('admin.bornemenu.edit')->with('bornemenu', $borneMenu);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BorneMenu  $borneMenu
     * @return \Illuminate\Http\Response
     */
    public function edit(BorneMenu $borneMenu)
    {
        return view('admin.bornemenu.edit')->with('bornemenu', $borneMenu);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BorneMenu  $borneMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BorneMenu $borneMenu)
    {
        $validatedData = $request->validate([
            'firstday' => 'required|date',
            'timeframe' => 'required|string',
            'comment' => 'required|string',
        ]);

        $validatedData['online'] = $request->online == 'on' ? true : false;

        if($request->image) {
            $borneMenu->addMedia($request->image)
                      ->toMediaCollection('menu');
        }

        session()->flash('message', 'Børnemenu updated successfully!!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BorneMenu  $borneMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(BorneMenu $borneMenu)
    {
        foreach ($borneMenu->retter as $ret) {
            $ret->delete();
        }
        $borneMenu->delete();

        session()->flash('message', 'Børnemenu deleted successfully!!');

        return redirect()->to(route('admin.borneMenu.index'));
    }
}
