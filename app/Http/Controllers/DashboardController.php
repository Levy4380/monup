<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $contactos = Contacto::query()
            ->orderByDesc('created_at')
            ->orderByDesc('id')
            ->get();

        return view('dashboard', compact('contactos'));
    }
}
