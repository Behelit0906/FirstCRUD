<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class ProductoController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $productos = Producto::latest()->paginate(5);
        }
        catch(Exception $e){
            $productos = [];
        }
        
        return view('inventario.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventario.create');
    }


    private function validacionesExtras($codigo): string{
        switch ($codigo){
            case '2002':
                $message = 'Encienda su servidor MySQL';
                break;
            
            case '23000':
                $message = "Ya hay registrado un producto con ese código";
                break;

            case '42S02':
                $message = "La tabla aún no ha sido creada";
                break;
            
            case '1049':
                $message = 'La base de datos aún no ha sido creada';
                break;

            default:
                $message = 'Error desconocido, intente más tarde';
                break;
        }

        return $message;
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
            'id' => 'required|min:4|max:15',
            'nombre' => 'required|min:5|max:30',
            'marca' => 'required|min:3|max:30',
            'precio' => 'required|numeric',
            'cantidad' => 'required|numeric'
        ]);

        try{
            // $producto = new Producto();
            // $producto->id = $request->id;
            // $producto->nombre = $request->nombre;
            // $producto->marca = $request->marca;
            // $producto->precio = $request->precio;
            // $producto->cantidad = $request->cantidad;
            // $producto->save();

            $request->merge(['slug' => Str::slug($request->input('nombre'),'-')]);

            Producto::create($request->all());

            return redirect()->route('index')->with(['success-message' => 'Producto registrado']);
        }
        catch(\Exception $e){          
            $message = $this->validacionesExtras($e->getCode());   
            return redirect()->back()->with(['error-message' => $message]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        return view('inventario.edit',compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required|min:5|max:30',
            'marca' => 'required|min:3|max:30',
            'precio' => 'required|numeric',
            'cantidad' => 'required|numeric'
        ]);

        $request->merge(['slug' => Str::slug($request->input('nombre'),'-')]);

        $producto->update($request->all());
        return redirect()->route('index')->with(['success-message' => 'Producto actualizado']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('index')->with(['success-message' => 'Producto eliminado']);
    }
}
