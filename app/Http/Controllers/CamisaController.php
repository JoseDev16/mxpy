<?php

namespace App\Http\Controllers;

use App\Camisa;
use App\Coleccion;
use App\Color;
use App\Camisa_Color;
use Illuminate\Http\Request;

class CamisaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $camisas = Camisa::orderBy('id','desc')->paginate(5); 
        $colecciones = Coleccion::all();
        $colores = Color::all();
        return \view('Camisas.index',compact(['camisas', 'colecciones','colores']));
        
    }

    public function indexCamisas($id)
    {
        $camisas = Camisa::where('coleccions_id',$id)->get();
        $coleccion = Coleccion::FindOrFail($id);
        return \view('Camisas.indexCamisas',compact(['camisas','coleccion']));


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
            'nombre_camisa' => 'required|max:40'
        ]);
        
        $camisa = new Camisa;
        
        $camisa->nombre_camisa = $request->nombre_camisa;
        $camisa->descripcion = $request->descripcion;
        $camisa->precio = $request->precio;
        $camisa->coleccions_id = $request->coleccions_id;
        if($request->hasFile('ruta'));
        {
            $file = $request->file('ruta2');
            $nombre_archivo = $file->getClientOriginalName();
            $file->move(public_path("img"),$nombre_archivo);
            $camisa->ruta_img = $nombre_archivo;
            //$camisa_color->ruta_img =$request->file('ruta')->store('upload','public');
     
            
        }
        
        $camisa->save();
        //$camisa->id;
        return back()->with('exito','La camisa ha sido agregada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Camisa  $camisa
     * @return \Illuminate\Http\Response
     */
    public function show(Camisa $camisa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Camisa  $camisa
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
        $camisa = Camisa::FindOrFail($id);
            return response()->json($camisa);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Camisa  $camisa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $id = $request -> edit_id;

        $this->validate($request, [
            'nomb_camisa' => 'required|max:40'
        ]);

        $camisa = Camisa::FindOrFail($id);

        if (empty($id)) {

            return back();
        }

        
        $camisa->coleccions_id = $request->cat_id;
        $camisa->nombre_camisa = $request->nomb_camisa;
        $camisa->descripcion = $request->dcp;
        $camisa->precio = $request->prc;
        $camisa->save();

        return back()->with('exito','La camisa ha sido actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Camisa  $camisa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->delete_id;
        $camisa = Camisa::FindOrFail($id);

        if (empty($camisa)) {
            return back();
        }
        
        //$this->authorize('verify', $camisa);
        $camisa->delete();
        return back()->with('exito','La camisa ha sido eliminada exitosamente');
    }
}
