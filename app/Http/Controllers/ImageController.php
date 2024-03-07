<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        // Validar que se haya enviado una imagen
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Ajusta las reglas de validación según tus necesidades
        ]);

        // Guardar la imagen en la carpeta public/images
        $path = $request->file('image')->store('images', 'public');

        // Guardar la ruta de la imagen en la base de datos
        $image = new Image();
        $image->path = $path;
        $image->save();

        // Devolver una respuesta adecuada
        return response()->json(['path' => $path], 200);
    }
}
