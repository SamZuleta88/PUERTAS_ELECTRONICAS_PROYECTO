<?php

namespace App\Http\Controllers;

use App\Http\Requests\CotizacionRequest;
use App\Models\Cotizacion;
use App\Models\Detalle;
use App\Models\Producto;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CotizacionController extends Controller
{
    public function cotizador() {

        $productos = Producto::with('materiales')->get();
        return Inertia::render('Dashboard', compact('productos'));

    }

    public function index() {

        $cotizaciones = Cotizacion::with('detalles', 'user')->get();
        return Inertia::render('Cotizaciones', compact('cotizaciones'));

    }

    public function misCotizaciones() {

        $cotizaciones = Cotizacion::with('detalles', 'user')->where('user_id', auth()->user()->id)->get();
        return Inertia::render('MisCotizaciones', compact('cotizaciones'));

    }

    public function store(CotizacionRequest $request) {

        $data = $request->validated();

        $cotizacion = new Cotizacion();

        $cotizacion->producto_id = $data['producto']['id'];
        $cotizacion->ancho = $data['ancho'];
        $cotizacion->alto = $data['alto'];
        $cotizacion->total = $data['total'];
        $cotizacion->user_id = auth()->user()->id;

        $cotizacion->save();

        /* Guardamos los detalles de cada producto */

        foreach ($data['detalles'] as $row) {

            $detalle = new Detalle();

            $detalle->cotizacion_id = $cotizacion->id;
            $detalle->material = $row['material'];
            $detalle->formula = $row['formula'];
            $detalle->total = $row['total'];

            $detalle->save();

        }

        return redirect()->route('dashboard')->with('success', 'Cotizacion guardada con exito con exito.');

    }
}
