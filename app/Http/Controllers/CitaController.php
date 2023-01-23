<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;

class CitaController extends Controller
{
    public function index()
    {
        $citas = Cita::all();

        $data = array(
            'status' => 200,
            'data' => $citas
        );

        return response()->json($data, 200);
    }

    public function show($id)
    {
        $cita = Cita::find($id);

        if (!$cita) {
            return response()->json([], 404);
        }

        $data = array(
            'status' => 200,
            'data' => $cita
        );

        return response()->json($data, 200);
    }


    public function store(Request $request)
    {
        $errors = [];
        if ($request->contenido === '' || $request->contenido === null) {
            $error = 'El campo contenido es obligatorio';
            array_push($errors, $error);
        }
        if ($request->fecha_difusion === '' || $request->fecha_difusion === null) {
            $error = 'El campo fecha_difusion es obligatorio';
            array_push($errors, $error);
        }
        if ($errors) {
            return response()->json($errors, 403);
        }

        $cita = new Cita();
        $cita->contenido = $request->contenido;
        $cita->fecha_difusion = $request->fecha_difusion;
        $cita->save();

        $data = array(
            'message' => 'Se registro correctamente',
            'status' => 200,
            'data' => $cita
        );

        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {

        $errors = [];
        if ($request->contenido === '' || $request->contenido === null) {
            $error = 'El campo contenido es obligatorio';
            array_push($errors, $error);
        }
        if ($request->fecha_difusion === '' || $request->fecha_difusion === null) {
            $error = 'El campo fecha_difusion es obligatorio';
            array_push($errors, $error);
        }
        if ($errors) {
            return response()->json($errors, 403);
        }

        $cita = Cita::find($id);

        $cita->contenido = $request->contenido;
        $cita->fecha_difusion = $request->fecha_difusion;
        $cita->update();

        $data = array(
            'message' => 'Se edito correctamente',
            'status' => 200,
            'data' => $cita
        );

        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $cita = Cita::find($id);

        if (!$cita) {
            return response()->json("Cita no encontrada", 404);
        }

        $cita->delete();

        $data = array(
            'status' => 200,
            'message' => 'success'
        );

        return response()->json($data, 200);
    }
}
