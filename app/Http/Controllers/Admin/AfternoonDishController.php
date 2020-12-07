<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AfternoonDish;
use App\Models\EftermiddagsMenu;
use Illuminate\Http\Request;

class AfternoonDishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, EftermiddagsMenu $eftermiddagsMenu)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'content' => 'required|string',
            'price' => 'required|numeric',
            'order' => 'nullable|numeric',
        ]);
        $eftermiddagsMenu->retter()->create($validatedData);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AfternoonDish  $afternoonDish
     * @return \Illuminate\Http\Response
     */
    public function show(AfternoonDish $afternoonDish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AfternoonDish  $afternoonDish
     * @return \Illuminate\Http\Response
     */
    public function edit(AfternoonDish $afternoonDish)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AfternoonDish  $afternoonDish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AfternoonDish $afternoonDish)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'content' => 'required|string',
            'price' => 'required|numeric',
            'order' => 'required|numeric',
        ]);

        $afternoonDish->update($validatedData);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AfternoonDish  $afternoonDish
     * @return \Illuminate\Http\Response
     */
    public function destroy(AfternoonDish $afternoonDish)
    {
        $afternoonDish->delete();
    }
}
