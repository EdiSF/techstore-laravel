<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TechStoreController extends Controller
{
    public function inicio()
    {
        return view('inicio');
    }

    public function nosotros()
    {
        return view('nosotros');
    }

    public function contacto()
    {
        return view('contacto');
    }

    public function enviarContacto(Request $request)
    {
        // Validación básica del formulario de contacto
        $validado = $request->validate([
            'nombre' => 'required|string|max:100',
            'email' => 'required|email',
            'asunto' => 'required|string|max:150',
            'mensaje' => 'required|string'
        ]);
        
        // Redirección con mensaje de éxito (se muestra en el layout)
        return back()->with('exito', '¡Gracias por escribirnos! Te responderemos pronto.');
    }

    public function productos()
    {
        // Como los productos están fijos en el HTML de la vista y se filtran con JavaScript,
        // el controlador solo necesita cargar la vista directamente.
        return view('productos');
    }
}