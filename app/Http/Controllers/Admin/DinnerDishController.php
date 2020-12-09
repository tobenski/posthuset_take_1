<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AftenMenu;
use App\Models\DinnerDish;
use Illuminate\Http\Request;

class DinnerDishController extends Controller
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
    public function store(Request $request, AftenMenu $aftenMenu)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'content' => 'required|string',
            'price' => 'required|numeric',
            'order' => 'nullable|numeric',
            'menu_type_id' => 'required|numeric',
            ]);

            $aftenMenu->retter()->create($validatedData);

            return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DinnerDish  $dinnerDish
     * @return \Illuminate\Http\Response
     */
    public function show(DinnerDish $dinnerDish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DinnerDish  $dinnerDish
     * @return \Illuminate\Http\Response
     */
    public function edit(DinnerDish $dinnerDish)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DinnerDish  $dinnerDish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DinnerDish $dinnerDish)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'content' => 'required|string',
            'price' => 'required|numeric',
            'order' => 'required|numeric',
            'menu_type_id' => 'required|numeric',
        ]);

        $dinnerDish->update($validatedData);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DinnerDish  $dinnerDish
     * @return \Illuminate\Http\Response
     */
    public function destroy(DinnerDish $dinnerDish)
    {
        $dinnerDish->delete();
    }
}
