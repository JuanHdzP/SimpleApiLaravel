<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function getAll()
    {
        return response()->json([
            'success' => true,
            'categorias' => Categoria::all()
        ], 200);
    }
    public function getById($id)
    {
        $categoria = Categoria::where('id', $id)->get();
        $exist = count($categoria);

        if ($exist > 0) {
            return response()->json([
                'success' => true,
                'categoria' => $categoria
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'msg' => "Categoria con id " . $id . " no encontrada"
            ], 404);
        }
    }

    public function create(Request $request)
    {
        $categoria = Categoria::create($request->all());
        return response()->json([
            'success' => true,
            'categoria' => $categoria
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $categoria = Categoria::find($id);
        if ($categoria != null) {
            $categoria->update($request->all());
            return response()->json([
                'success' => true,
                'categoria' => $categoria
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'msg' => "Categoria con id " . $id . " no encontrada"
            ], 404);
        }
    }

    public function delete($id)
    {
        $categoria = Categoria::find($id);
        if ($categoria != null) {
            $categoria->delete();
            return response()->json([
                'success' => true,
                'msg' => "Categoria eliminada correctamente"
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'msg' => "Categoria con id " . $id . " no encontrada"
            ], 404);
        }
    }
}
