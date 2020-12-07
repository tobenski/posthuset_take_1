<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BorneMenu;
use App\Models\ChildrensDish;
use Illuminate\Http\Request;

class ChildrensDishController extends Controller
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
    public function store(Request $request, BorneMenu $borneMenu)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'content' => 'required|string',
            'price' => 'required|numeric',
            'order' => 'nullable|numeric',
        ]);

        $borneMenu->retter()->create($validatedData);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChildrensDish  $childrensDish
     * @return \Illuminate\Http\Response
     */
    public function show(ChildrensDish $childrensDish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChildrensDish  $childrensDish
     * @return \Illuminate\Http\Response
     */
    public function edit(ChildrensDish $childrensDish)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChildrensDish  $childrensDish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChildrensDish $childrensDish)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'content' => 'required|string',
            'price' => 'required|numeric',
            'order' => 'required|numeric',
        ]);

        $childrensDish->update($validatedData);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChildrensDish  $childrensDish
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChildrensDish $childrensDish)
    {
        $childrensDish->delete();
    }
}
