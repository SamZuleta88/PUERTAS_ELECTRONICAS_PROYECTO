<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Cotizacion;
use Barryvdh\DomPDF\Facade\Pdf;



class ExportController extends Controller
{
    public function users(){
        return Excel::download(new UsersExport, 'Users.xlsx');
    }
    public function DescargarPDF(Cotizacion $cotizacion){
        $cotizacion = Cotizacion::where('id', $cotizacion->id)->with('detalles','producto','user')->first();
        $pdf = Pdf::loadView('cotizacionPDF', compact('cotizacion'));
        return $pdf->stream();

        #return $pdf->download('cotizacionPDF');

    }
}
