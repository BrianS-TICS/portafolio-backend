<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function index()
    {
        $autor = Author::all();

        $data = array(
            'status' => 200,
            'data' => $autor
        );

        return response()->json($data, 200);
    }

    public function show($id)
    {
        $autor = Author::find($id);

        if (!$autor) {
            return response()->json([], 404);
        }

        $data = array(
            'status' => 200,
            'data' => $autor
        );

        return response()->json($data, 200);
    }


    public function store(Request $request)
    {
        $errors = [];
        if ($request->nombre === '' || $request->nombre === null) {
            $error = 'El campo nombre es obligatorio';
            array_push($errors, $error);
        }
        if ($request->apellidos === '' || $request->apellidos === null) {
            $error = 'El campo apellidos es obligatorio';
            array_push($errors, $error);
        }
        if ($errors) {
            return response()->json($errors, 403);
        }

        $autor = new Author();
        $autor->nombre = $request->nombre;
        $autor->apellidos = $request->apellidos;
        $autor->save();

        $data = array(
            'message' => 'Se registro correctamente',
            'status' => 200,
            'data' => $autor
        );

        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {

        $errors = [];
        if ($request->nombre === '' || $request->nombre === null) {
            $error = 'El campo nombre es obligatorio';
            array_push($errors, $error);
        }
        if ($request->apellidos === '' || $request->apellidos === null) {
            $error = 'El campo apellidos es obligatorio';
            array_push($errors, $error);
        }
        if ($errors) {
            return response()->json($errors, 403);
        }

        $autor = Author::find($id);

        $autor->nombre = $request->nombre;
        $autor->apellidos = $request->apellidos;
        $autor->update();

        $data = array(
            'message' => 'Se edito correctamente',
            'status' => 200,
            'data' => $autor
        );

        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $autor = Author::find($id);

        if (!$autor) {
            return response()->json("autor no encontrada", 404);
        }

        $autor->delete();

        $data = array(
            'status' => 200,
            'message' => 'success'
        );

        return response()->json($data, 200);
    }
}
