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
            'payload' => $request->safe()->only(['nombre', 'apellido', 'mensaje']),
        ]);

        return back()->with('success', 'Mensaje enviado. Te respondo pronto.');
    }
}
