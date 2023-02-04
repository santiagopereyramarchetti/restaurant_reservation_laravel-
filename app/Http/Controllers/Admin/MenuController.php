<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuStoreRequest;
use App\Http\Requests\MenuUpdateRequest;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menues = Menu::all();
        return view('admin.menues.index', compact('menues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.menues.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuStoreRequest $request)
    {
        $validated = $request->validated();
        $image = $validated['image']->store('public/menues');
        $menu = Menu::create([
            'name'=> $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'image' => $image
        ]);
        if(isset($validated['categories'])){
            $menu->categories()->attach($validated['categories']);
        }
        return to_route('admin.menues.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menue)
    {
        $categories = Category::all();
        return view('admin.menues.edit', compact('menue','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MenuUpdateRequest $request, Menu $menue)
    {
        $image = $menue->image;
        $validated = $request->validated();
        if(isset($validated['image']) && $validated['image']->isValid()){
            Storage::delete($image);
            $image = $validated['image']->store('public/menues');
        }
        if(isset($validated['categories'])){
            $menue->categories()->sync($validated['categories']);
        }
        $menue->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'image' => $image
        ]);
        return to_route('admin.menues.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menue)
    {
        $menue->delete();
        return to_route('admin.menues.index');
    }
}
