<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Cita;


class CitaController extends Controller
{
    public function index()
    {
        $citas = Cita::all();
        $citaComplete = array();
        $i = 0;

        foreach ($citas as $cita) {
            $citaComplete[$i] = ([
                    "id_author" => $cita->author->id,
                    "name_author" => $cita->author->nombre . " " . $cita->author->apellidos,
                    "contenido" => $cita->contenido,
                    "id_quote" => $cita->id,
                    "fecha_difusion" => $cita->fecha_difusion,
                ]
            );
            $i++;
        }

        $data = array(
            'status' => 200,
            'data' => $citaComplete
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

        $author = Author::find($request->author_id);

        if (!$author) {
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

        $citaComplete = array(
            "contenido" => $cita->contenido,
            "fecha_difusion" => $cita->fecha_difusion,
            "created_at" => $cita->created_at,
            "id_quote" => $cita->id,
            "name_author" => $author->nombre . " " . $author->apellidos,
            "id_author" => $author->id
        );

        $data = array(
            'message' => 'Se registro correctamente',
            'status' => 200,
            'data' => $citaComplete
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

        $author = Author::find($request->author_id);

        if (!$author) {
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

        $citaComplete = [
            "contenido" => $cita->contenido,
            "fecha_difusion" => $cita->fecha_difusion,
            "created_at" => $cita->created_at,
            "id_quote" => $cita->id,
            "name_author" => $author->nombre . " " . $author->apellidos,
            "id_author" => $author->id
        ];

        $data = array(
            'message' => 'Se edito correctamente',
            'status' => 200,
            'data' => $citaComplete
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
            'data' => $id,
            'message' => 'success'
        );

        return response()->json($data, 200);
    }
}
