<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;
use InvalidArgumentException;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto = trim($request->get('texto'));
        $clientes = DB::table('cliente')
            ->select('id', 'nombre', 'apellido', 'direccion', 'telefono', 'email')
            ->where('apellido', 'LIKE', '%' . $texto . '%')
            ->orderBy('apellido', 'asc')
            ->paginate(10)
        ;
        return view('cliente.index', compact('clientes', 'texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $cliente = new Cliente;

            // Comprobamos si el campo "telefono" es un número
            if (!is_numeric($request->input('telefono'))) {
                // Si no es un número, lanzamos una excepción de argumento inválido
                throw new InvalidArgumentException('El campo "telefono" debe ser un número');
            }

            $cliente->nombre = $request->input('nombre');
            $cliente->apellido = $request->input('apellido');
            $cliente->direccion = $request->input('direccion');
            $cliente->telefono = $request->input('telefono');
            $cliente->email = $request->input('email');
            $cliente->save();
            return redirect()->route('cliente.index');
        } catch (InvalidArgumentException $e) {
            // Si se lanza la excepción, mostramos un mensaje de error al usuario
            return redirect()->back()->with('error', $e->getMessage());

        }
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
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, $id){
        
        $cliente = Cliente::findOrFail($id);

        try {
            // Comprobamos si el campo "telefono" es un número
            if (!is_numeric($request->input('telefono'))) {
                // Si no es un número, lanzamos una excepción de argumento inválido
                throw new InvalidArgumentException('El campo "telefono" debe ser un número');
            }

            $cliente->nombre = $request->input('nombre');
            $cliente->apellido = $request->input('apellido');
            $cliente->direccion = $request->input('direccion');
            $cliente->telefono = $request->input('telefono');
            $cliente->email = $request->input('email');
            $cliente->save();
            return redirect()->route('cliente.index');
        } catch (InvalidArgumentException $e) {
            // Si se lanza la excepción, mostramos un mensaje de error al usuario
            return redirect()->back()->with('error', $e->getMessage());

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return redirect()->route('cliente.index');
    }

    public function deleteClientes(Request $request)
    {
        $ids = $request->ids;

        Cliente::whereIn('id', $ids)->delete();

        return redirect()->back();
    }
}