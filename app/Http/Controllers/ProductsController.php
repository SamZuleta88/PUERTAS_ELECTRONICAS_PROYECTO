<?php

namespace App\Http\Controllers;

use App\Http\Requests\Products\StoreRequest;
use App\Http\Requests\Products\UpdateRequest;
use App\Models\Material;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Producto;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::with('materiales:id,nombre')->get();
        return Inertia::render('Admin/Productos/Index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $materiales = Material::select('id', 'nombre')->get();
        return Inertia::render('Admin/Productos/Create', compact('materiales'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('imagen')) {
            $imagenUrl = $request->file('imagen')->store('productos', 'public');
            $data['imagen'] = asset('storage/' . $imagenUrl);
        }

        $producto = new Producto();

        $producto->nombre = $data['nombre'];
        $producto->imagen = $data['imagen'];
        $producto->descripcion = $data['descripcion'];

        $producto->save();

        $data['materiales'] = array_column($data['materiales'], 'id');

        if ($data['materiales']) {
            $producto->materiales()->attach($data['materiales']);
        }

        return redirect()->route('productos.index')->with('success', 'Producto creado con exito.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        $producto = Producto::with('materiales:id,nombre')->where('id', $producto->id)->first();
        $materiales = Material::select('id', 'nombre')->get();

        return Inertia::render('Admin/Productos/Edit', compact('producto', 'materiales'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Producto $producto)
    {
        $data = $request->validated();

        $producto = Producto::with('materiales')->where('id', $producto->id)->first();

        if ($request->hasFile('imagen')) {
            // Delete old Image if exists
            if ($producto->imagen) {
                Storage::delete($producto->imagen);
            }

            $imagenUrl = $request->file('imagen')->store('productos', 'public');
            $data['imagen'] = asset('storage/' . $imagenUrl);
        } else {
            $data['imagen'] = $producto->imagen;
        }

        $producto->nombre = $data['nombre'];
        $producto->imagen = $data['imagen'];

        $producto->update();

        $data['materiales'] = array_column($data['materiales'], 'id');

        if ($data['materiales']) {
            $producto->materiales()->detach($producto->materiales);
            $producto->materiales()->attach($data['materiales']);
        }

        return redirect()->route('productos.index')->with('success', 'Producto actualizado con exito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado con exito.');
    }
}
