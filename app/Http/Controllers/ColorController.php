<?php

namespace App\Http\Controllers;

use App\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $colores = Color::paginate(5);
        return view('Colores.index', \compact('colores'));

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
    public function store(Request $request)
    {
        $request->validate([
            'nombre_color' => 'required|max:50'
        ]);
        
        $color = new Color;        
        $color->nombre_color = $request->nombre_color;
        $color->save();
        return back()->with('exito','color agregado!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
        $color = Color::FindOrFail($id);
            return response()->json($color);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Color $color)
    {
        //

        $id = $request->edit_id;
    
        
        $color = Color::FindOrFail($id);

            
        $color->nombre_color = $request->nomb_color;
        $color->save();

        return back()->with('exito','color actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->delete_id;
        $color = Color::FindOrFail($id);
        if (empty($id)) {
            return back();
        }
        
        //$this->authorize('verify', $subcategoria);
        $color->delete();
        return back()->with('exito','color Eliminado');

    }
}
