<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Clientes::get();
       // dd($clientes);
        return view('clientes.index',['clientes' => $clientes]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      //  dd($request->all());
       $validated = $request->validate([
            'nombre' => 'required|string|max:50',
            'apellidos' => 'required|string|max:100',
            'correo' => 'required|string|max:100',
            'telefono' => 'required|integer|max:20',
            'fecha_nacimiento' => 'required'
        ]);
        
       Clientes::create($validated);
      /*Clientes::create([
        'nombre' => $validated['nombre'],
        'apellidos' => $validated['apellidos'],
        'correo' => $validated['correo'],
        'telefono' => $validated['telefono'],
        'fecha_nacimiento' => $validated['fecha_nacimiento']

       ]);*/
      
        //redirecciono a el nombre d eruta clientes.index, que esta en web.php
       return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Clientes $clientes)
    {
        return view('clientes.show')->with('id', $id);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Clientes $clientes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Clientes $clientes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Clientes $clientes)
    {
        //
    }
}
