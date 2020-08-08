<?php

namespace App\Http\Controllers;

use App\Coleccion;
use Illuminate\Http\Request;

class ColeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $colecciones = Coleccion::paginate(5);
        return view('Coleccion.index', \compact('colecciones'));
    }

    public function indexhome()
    {
        $colecciones = Coleccion::orderBy('id','desc')->paginate(15);
        return view('Coleccion.indexHome', \compact('colecciones'));
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
        //
        $request->validate([
            'nombre_coleccion' => 'required|max:50'
        ]);
        
        $coleccion = new Coleccion;        
        $coleccion->nombre_coleccion = $request->nombre_coleccion;

        if($request->hasFile('ruta'));
        {
            $file = $request->file('ruta');
            $nombre_archivo = $file->getClientOriginalName();
            $file->move(public_path("img"),$nombre_archivo);
            $coleccion->ruta_img = $nombre_archivo;
            //$camisa_color->ruta_img =$request->file('ruta')->store('upload','public');
     
            
        }
        $coleccion->save();
        return back()->with('exito','coleccion agreda!');
    }

    public function editView(Request $request, $id)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Coleccion  $coleccion
     * @return \Illuminate\Http\Response
     */
    public function show(Coleccion $coleccion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coleccion  $coleccion
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
       
           $coleccion = Coleccion::find($id);
            return response()->json($coleccion);
        

       

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coleccion  $coleccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //


       $id = $request->edit_id;
    
        
        $coleccion = Coleccion::FindOrFail($id);

            
        $coleccion->nombre_coleccion = $request->nomb_coleccion;
        $coleccion->save();

        return back()->with('exito','coleccion actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coleccion  $coleccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
        $id = $request->delete_id;
        $coleccion = Coleccion::find($id);
        if (empty($id)) {
            return back();
        }
        
        //$this->authorize('verify', $subcategoria);
        $coleccion->delete();
        return back()->with('exito','coleccion Eliminada');

    }
}
