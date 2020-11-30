<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeBoxes;
use Illuminate\Http\Request;

class HomeBoxesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boxes = HomeBoxes::all();
        return view('admin.homeboxes.index')->with('boxes', $boxes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.homeboxes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'button' => 'required|string',
            'link' => 'required|url',
        ]);

        $box = HomeBoxes::create([
            'title' => $request->title,
            'content' => $request->content,
            'button' => $request->button,
            'link' => $request->link,
            'online' => $request->online == 'on' ? true : false,
        ]);

        session()->flash('message', 'HomeBox created successfully!!');

        return redirect()->to(route('admin.homebox.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomeBoxes  $homeBoxes
     * @return \Illuminate\Http\Response
     */
    public function show(HomeBoxes $homeBoxes)
    {
        return redirect()->to(route('admin.homebox.edit', $homeBoxes));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomeBoxes  $homeBoxes
     * @return \Illuminate\Http\Response
     */
    public function edit(HomeBoxes $homebox)
    {
        return view('admin.homeboxes.edit')->with('box', $homebox);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomeBoxes  $homeBoxes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomeBoxes $homebox)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'button' => 'required|string',
            'link' => 'required|url',
        ]);

        $homebox->update([
            'title' => $request->title,
            'content' => $request->content,
            'button' => $request->button,
            'link' => $request->link,
            'online' => $request->online == 'on' ? true : false,
        ]);

        $homebox->save();

        session()->flash('message', 'HomeBox updated successfully!!');

        return redirect()->to(route('admin.homebox.edit', $homebox));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomeBoxes  $homeBoxes
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeBoxes $homeBoxes)
    {
        $homeBoxes->delete();

        session()->flash('message', 'HomeBox deleted successfully!!');

        return redirect()->to(route('admin.homebox.index'));
    }
}
