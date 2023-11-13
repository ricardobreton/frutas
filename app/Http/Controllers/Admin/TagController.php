<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colores= [
            'red'=>'Color rojo',
             'yellow'=>'Color amarillo',
             'green'=>'Color verde',
             'blue'=>'Color azul',
             'indigo'=>'Color indigo',
             'purple'=>'Color morado',
             'pink'=>'Color rosado'
            ];
        return view('admin.tags.create', compact('colores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['slug'] = Str::slug($request->name, '-');
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:tags',
            'color' => 'required',

        ]);
        $tag = Tag::create($request->all());
        return redirect()->route('admin.tags.edit', compact('tag'))->with('info', 'La etiqueta se creó con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return view('admin.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        $colores= [
            'red'=>'Color rojo',
             'yellow'=>'Color amarillo',
             'green'=>'Color verde',
             'blue'=>'Color azul',
             'indigo'=>'Color indigo',
             'purple'=>'Color morado',
             'pink'=>'Color rosado'
            ];
        return view('admin.tags.edit', compact('tag', 'colores'))->with('info', 'La etiqueta se actualizó con exito.');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $request['slug'] = Str::slug($request->name, '-');
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:tags,slug,'. $tag->id,
            'color' => 'required',
        ]);
        $tag->update($request->all());
        return redirect()->route('admin.tags.edit', compact('tag'))->with('info', 'La etiqueta se actualizó con exito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tags.index')->with('info', 'La categoría se actualizó con exito.');
    }
}
