<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnbefalerDish;
use App\Models\AnbefalerMenu;
use Illuminate\Http\Request;

class AnbefalerDishController extends Controller
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
    public function store(Request $request, AnbefalerMenu $anbefalerMenu)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'content' => 'required|string',
            'price' => 'required|numeric',
            'order' => 'nullable|numeric',
            'menu_type_id' => 'required|numeric',
        ]);

        $anbefalerMenu->retter()->create($validatedData);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnbefalerDish  $anbefalerDish
     * @return \Illuminate\Http\Response
     */
    public function show(AnbefalerDish $anbefalerDish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnbefalerDish  $anbefalerDish
     * @return \Illuminate\Http\Response
     */
    public function edit(AnbefalerDish $anbefalerDish)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnbefalerDish  $anbefalerDish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AnbefalerDish $anbefalerDish)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'content' => 'required|string',
            'price' => 'required|numeric',
            'order' => 'required|numeric',
        ]);

        $anbefalerDish->update($validatedData);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnbefalerDish  $anbefalerDish
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnbefalerDish $anbefalerDish)
    {
        $anbefalerDish->delete();
    }
}
