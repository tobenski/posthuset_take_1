<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FrokostMenu;
use App\Models\LunchDish;
use Illuminate\Http\Request;

class LunchDishController extends Controller
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
    public function store(Request $request, FrokostMenu $frokostmenu)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'content' => 'required|string',
            'price' => 'required|numeric',
            'order' => 'nullable|numeric',
        ]);
        $frokostmenu->retter()->create($validatedData);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LunchDish  $lunchDish
     * @return \Illuminate\Http\Response
     */
    public function show(LunchDish $lunchDish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LunchDish  $lunchDish
     * @return \Illuminate\Http\Response
     */
    public function edit(LunchDish $lunchDish)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LunchDish  $lunchDish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LunchDish $lunchDish)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'content' => 'required|string',
            'price' => 'required|numeric',
            'order' => 'required|numeric',
        ]);

        $lunchDish->update($validatedData);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LunchDish  $lunchDish
     * @return \Illuminate\Http\Response
     */
    public function destroy(LunchDish $lunchDish)
    {
        //
    }
}

