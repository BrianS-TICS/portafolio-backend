<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;

class CitaController extends Controller
{
    public function index(Request $request)
    {
        $citas = Cita::all();
        return $citas;
    }

    public function show($id)
    {
        return 'Hola show 1';
    }

    public function store(Request $request)
    {
        return 'Hola post';
    }

    public function update(Request $request, $id)
    {
        return 'Hola update';
    }

    public function destroy(Request $request, $id)
    {
        return 'Hola destroy';
    }
}
