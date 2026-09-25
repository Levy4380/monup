<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactoRequest;
use App\Models\Contacto;
use Illuminate\Http\RedirectResponse;

class ContactoController extends Controller
{
    public function store(StoreContactoRequest $request): RedirectResponse
    {
        Contacto::query()->create([
            'payload' => $request->safe()->only([
                'nombre_completo',
                'correo',
                'telefono',
                'fecha_nacimiento',
                'ciudad',
                'nivel_escalada',
                'tiempo_escalando',
                'modalidad',
                'objetivo_principal',
                'lesiones',
                'lesion_explicacion',
                'dato_relevante',
                'entrenamiento_online',
            ]),
        ]);

        return redirect()
            ->route('home')
            ->with('contacto_enviado', true);
    }
}
