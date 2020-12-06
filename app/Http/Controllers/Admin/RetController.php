<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FrokostMenu;
use App\Models\Ret;
use Illuminate\Http\Request;

class RetController extends Controller
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
        ]);
        $frokostmenu->retter()->create($validatedData);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ret  $ret
     * @return \Illuminate\Http\Response
     */
    public function show(Ret $ret)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ret  $ret
     * @return \Illuminate\Http\Response
     */
    public function edit(Ret $ret)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ret  $ret
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ret $ret)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'content' => 'required|string',
            'price' => 'required|numeric',
        ]);
        $ret->update($validatedData);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ret  $ret
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ret $ret)
    {
        $ret->delete();
        return redirect()->back();
    }
}
