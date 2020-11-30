<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Seo;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();

        return view('admin.pages.index')->with('pages', $pages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
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
            'name' => 'required|string',
            'online' => '',
            'title' => 'nullable|string|max:55',
            'description' => 'nullable|string|max:155',
            'keywords' => 'nullable|string',
            'og_title' => 'nullable|string|max:55',
            'og_description' => 'nullable|string|max:155',
            'og_url' => 'nullable|string',
            'og_type' => 'nullable|string',
            'og_image' => 'nullable|string',
        ]);

        Page::create([
            'name' => $request->name,
            'online' => $request->online == 'on' ? true : false,
        ]);
        Seo::create([
            'title' => $request->title,
            'description' => $request->description,
            'keywords' => $request->keywords,
            'og_title' => $request->og_title,
            'og_description' => $request->og_description,
            'og_url' => $request->og_url,
            'og_type' => $request->og_type,
            'og_image' => $request->og_image,
        ]);

        session()->flash('message', 'Page created successfully');

        return redirect()->to(route('admin.pages.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //return view('admin.pages.show')->with('page', $page);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::where('id', $id)->first();
        if(!$page->seo) {
            $page->seo()->create();
        }
        return view('admin.pages.edit')->with('page', $page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'online' => '',
            'title' => 'nullable|string|max:55',
            'description' => 'nullable|string|max:155',
            'keywords' => 'nullable|string',
            'og_title' => 'nullable|string|max:55',
            'og_description' => 'nullable|string|max:155',
            'og_url' => 'nullable|string',
            'og_type' => 'nullable|string',
            'og_image' => 'nullable|string',
        ]);
        $page = Page::where('id', $id)->first();
        //dd($request->extra);
        $page->update([
            'name' => $request->name,
            'online' => $request->online == 'on' ? true : false,
        ]);
        $page->seo->update([
            'title' => $request->title,
            'description' => $request->description,
            'keywords' => $request->keywords,
            'og_title' => $request->og_title,
            'og_description' => $request->og_description,
            'og_url' => $request->og_url,
            'og_type' => $request->og_type,
            'og_image' => $request->og_image,
        ]);
        $page->save();

        session()->flash('message', 'Page updated successfully');

        return redirect()->to(route('admin.pages.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page->delete();
        session()->flash('message', 'Page deleted Succsfully');
        return redirect()->back();
    }
}
