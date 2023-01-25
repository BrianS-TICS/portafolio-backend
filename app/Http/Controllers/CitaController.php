<?php

namespace App\Http\Controllers;

use App\Models\Author;
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
        if ($request->author_id === '' || $request->author_id === null) {
            $error = 'El campo author_id es obligatorio';
            array_push($errors, $error);
        }

        $athor = Author::find($request->author_id);

        if (!$athor) {
            $error = 'El autor no existe';
            array_push($errors, $error);
        }

        if ($errors) {
            return response()->json($errors, 403);
        }

        $cita = new Cita();
        $cita->contenido = $request->contenido;
        $cita->fecha_difusion = $request->fecha_difusion;
        $cita->authors_id = $request->author_id;
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
        if ($request->author_id === '' || $request->author_id === null) {
            $error = 'El campo author_id es obligatorio';
            array_push($errors, $error);
        }

        $athor = Author::find($request->author_id);

        if (!$athor) {
            $error = 'El autor no existe';
            array_push($errors, $error);
        }

        if ($errors) {
            return response()->json($errors, 403);
        }

        $cita = Cita::find($id);

        $cita->contenido = $request->contenido;
        $cita->fecha_difusion = $request->fecha_difusion;
        $cita->authors_id = $request->author_id;
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
