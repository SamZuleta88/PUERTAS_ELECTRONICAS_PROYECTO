<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CotizacionController extends Controller
{
    public function index() {

        $productos = Producto::with('materiales')->get();
        return Inertia::render('Dashboard', compact('productos'));

    }
}
