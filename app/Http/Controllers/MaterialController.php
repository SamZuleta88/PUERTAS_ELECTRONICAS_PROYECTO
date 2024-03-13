<?php

namespace App\Http\Controllers;

use App\Http\Requests\MaterialRequest;
use App\Models\Material;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materiales = Material::all();
        return Inertia::render('Admin/Materiales/Index', compact('materiales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Materiales/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MaterialRequest $request)
    {
        $data = $request->validated();
        Material::create($data);
        return redirect()->route('materiales.index')->with('success', 'Material creado con exito.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Material $materiale)
    {
        return Inertia::render('Admin/Materiales/Edit', compact('materiale'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MaterialRequest $request, Material $materiale)
    {
        $data = $request->validated();
        $materiale->update($data);
        return redirect()->route('materiales.index')->with('success', 'Material actualizado con exito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $materiale)
    {
        $materiale->delete();
        return redirect()->route('materiales.index')->with('success', 'Material eliminado con exito.');
    }
}
