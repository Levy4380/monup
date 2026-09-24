<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreContactoRequest extends FormRequest
{
    protected $redirectRoute = 'formulario';

    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'nombre_completo' => ['required', 'string', 'max:120'],
            'correo' => ['required', 'email', 'max:120'],
            'telefono' => ['required', 'string', 'max:40'],
            'fecha_nacimiento' => ['required', 'date'],
            'ciudad' => ['required', 'string', 'max:100'],
            'nivel_escalada' => ['required', 'string', 'max:100'],
            'tiempo_escalando' => ['required', 'string', 'max:100'],
            'modalidad' => ['required', 'array', 'min:1'],
            'modalidad.*' => ['string', Rule::in(['boulder', 'deportiva'])],
            'objetivo_principal' => ['required', 'string', 'max:400'],
            'lesiones' => ['required', Rule::in(['si', 'no'])],
            'lesion_explicacion' => ['nullable', 'required_if:lesiones,si', 'string', 'max:400'],
            'dato_relevante' => ['nullable', 'string', 'max:400'],
            'entrenamiento_online' => ['required', Rule::in(['si', 'no'])],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'nombre_completo' => 'nombre completo',
            'correo' => 'correo',
            'telefono' => 'teléfono',
            'fecha_nacimiento' => 'fecha de nacimiento',
            'ciudad' => 'ciudad',
            'nivel_escalada' => 'nivel de escalada',
            'tiempo_escalando' => 'tiempo escalando',
            'modalidad' => 'modalidad de escalada',
            'objetivo_principal' => 'objetivo principal',
            'lesiones' => 'lesiones',
            'lesion_explicacion' => 'explicación de la lesión',
            'dato_relevante' => 'dato relevante',
            'entrenamiento_online' => 'entrenamiento online',
        ];
    }
}
