<?php

namespace App\Http\Controllers;

use App\Camisa_Color;
use Illuminate\Http\Request;
use App\Camisa;
use App\Color;
use App\Coleccion;

class CamisaColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $colores =Color::get();
        $camisas = Camisa::get();
        $colecciones = Coleccion::get();
        $camisasColores= Camisa_Color::all();
        
        
        return view('CamisaColor.index', compact('camisasColores','camisas','colores','colecciones'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $colecciones = Coleccion::All();
        $colores=Color::all();
        return \view('CamisaColor.create',compact('colecciones','colores'));
    }
    public function agregarColor()
    {
        $camisas = Camisa::all();
        $colores=Color::all();
        return \view('CamisaColor.agregarColor',compact('camisas','colores'));

    }
    public function detalleCamisa($id)
    {
        $camisas_colores = Camisa_Color::where('camisas_id', $id)->where('disponible',1)->get();

        
      
        //dd($idCamisas);
        //dd($i);
        //dd($idColores);
        $camisa = Camisa::FindOrFail($id);
        $coleccion = Coleccion::FindOrFail($camisa->coleccions_id);
        $cant = (count($camisas_colores)-1);
        $colores=[];

        $idColores=[];
        for($i=0; $i<=$cant; $i++)
        {     
            $idColores[$i] = $camisas_colores[$i]->colors_id; 
            $color = Color::FindOrFail($idColores[$i]);
            $colores[$i] = $color->nombre_color;
        

        }
        
       

        return view('CamisaColor.detalle',compact('camisas_colores','camisa','coleccion','idColores','colores','cant'));
        

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
       $camisa_color = new Camisa_Color();

      //Cuando se consulta desde agregar color a camisa ya creada
        if($request->AddColor == 1)
        {   
            $camisa_color->camisas_id=$request->camisas_id;


        }//Cuando sea crea una camisa completa
        else{
            $camisa = new Camisa;
            
            $camisa->nombre_camisa = $request->nombre_camisa;
            $camisa->descripcion = $request->descripcion;
            $camisa->precio = $request->precio;
           $camisa->coleccions_id = $request->coleccion_id;
            //codigo para imagen publicitaria
            if($request->hasFile('ruta2'));
            {
                $file = $request->file('ruta2');
                $nombre_archivo = $file->getClientOriginalName();
                $file->move(public_path("img"),$nombre_archivo);
                $camisa->ruta_img = $nombre_archivo;
   
            }
    
            $camisa->save();
            $camisa_color->camisas_id = $camisa->id;

        }
        
         $camisa_color->colors_id= $request->colors_id;
        $camisa_color->talla = $request->talla;
   
        if($request->disponible == "Disponible")
        {
            $camisa_color->disponible = 1;
        }else
        {
            $camisa_color->disponible = 0;
        }
        //Codigo para imagen de camisa segun color
        if($request->hasFile('ruta'));
        {
            $file = $request->file('ruta');
            $nombre_archivo = $file->getClientOriginalName();
            $file->move(public_path("img"),$nombre_archivo);
            $camisa_color->ruta_img = $nombre_archivo;
     
            
        }
        

        
        $camisa_color->save();

        return back()->with('exito','La camisa ha sido agregada exitosamente');
 
    }
    

 



    /**
     * Display the specified resource.
     *
     * @param  \App\Camisa_Color  $camisa_Color
     * @return \Illuminate\Http\Response
     */
    public function show(Camisa_Color $camisa_Color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Camisa_Color  $camisa_Color
     * @return \Illuminate\Http\Response
     */
    public function edit(Camisa_Color $camisa_Color)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Camisa_Color  $camisa_Color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Camisa_Color $camisa_Color)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Camisa_Color  $camisa_Color
     * @return \Illuminate\Http\Response
     */
    public function destroy(Camisa_Color $camisa_Color)
    {
        //
    }
}
