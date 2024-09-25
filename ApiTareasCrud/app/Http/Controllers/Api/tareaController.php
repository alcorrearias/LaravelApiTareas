<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tarea;
use Illuminate\Support\Facades\Validator;

class tareaController extends Controller
{
    /**
     * consultar todas las tareas creadas
     */
   public function consultarTareas()
   {
        try{
            $tareas = Tarea::all();

            if($tareas->isEmpty()){
                $data = [
                    'message' => 'No se encontraron tareas.'
                ];
                return response()->json($data,200);
            }

            $data = [
                'message' => $tareas,
                'status'  => 200
            ];

            return response()->json($tareas,200);
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }        
   }

   /***
    * crear la tarea en la bd
    */
   public function crearTarea(Request $request)
   {       
        try{
            $validator = Validator::make($request->all(), [
                'titulo' => 'required|max:255',
                'estado' => 'required|in:0,1'
            ]);

            if($validator->fails()){
                $data = [
                    'message' => 'Error en la validacion de los datos.',
                    'errors'  => $validator->errors(),
                    'status'  => 400
                ];
                return response()->json($data,400);
            }

            $tarea = Tarea::create([
                'titulo' => $request->titulo,
                'estado' => $request->estado
            ]);

            if(!$tarea){
                $data = [
                    'message' => 'Error al crear la tarea, intente mas tarde.',
                    'status'  => 500
                ];
                return response()->json($data,500);
            }

            $data = [
                'message' => 'se ha creado la tarea correctamente',
                'status'  => 200
            ];
            return response()->json($data,200);
        } catch (Exception $e) {
                echo $e->getMessage();
                die();
        }
    }

    /**
     * consultar una tarea especifica con id
     */
    public function consultarTarea($id)
    {
        try{
            if(is_null($id))
            { 
                $data = [
                    'message' => 'debe introducir el id de la tarea',
                    'status'  => 404
                ];
                return response()->json($data,404);
            }

            $tarea = Tarea::find($id);

            if(!$tarea){
                $data = [
                    'message' => 'la tarea no ha sido encontrada.',
                    'status'  => 404
                ];
                return response()->json($data,404);
            }

            $data = [
                'dato' => $tarea,
                'status'  => 200
            ];
            return response()->json($data,200);
        }
            catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }

     /**
     * actualizar las tarea que envia el usuario 
     */
    public function actualizarTarea(Request $request, $id)
    {
        try{
            if(is_null($id))
            { 
                $data = [
                    'message' => 'debe introducir el id de la tarea',
                    'status'  => 404
                ];
                return response()->json($data,404);
            }

            $tarea = Tarea::find($id);

            if(!$tarea){
                $data = [
                    'message' => 'la tarea no ha sido encontrada.',
                    'status'  => 404
                ];
                return response()->json($data,404);
            }

            $validator = Validator::make($request->all(), [
                'titulo' => 'required|max:255',
                'estado' => 'required|in:0,1'
            ]);

            if($validator->fails()){
                $data = [
                    'message' => 'Error en la validacion de los datos.',
                    'errors'  => $validator->errors(),
                    'status'  => 400
                ];
                return response()->json($data,400);
            }

            $tarea->titulo = $request->titulo;
            $tarea->estado = $request->estado;
            $tarea->save();

            $data = [
                'message' => 'la tarea ha sido actualizada.',
                'status'  => 200
            ];
            return response()->json($data,200);
        }
        catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }

     /**
     * eliminar la tarea que necesita el usuario
     */
    public function eliminarTarea($id)
    {
        try{
            if(is_null($id))
            { 
                $data = [
                    'message' => 'debe introducir el id de la tarea',
                    'status'  => 404
                ];
                return response()->json($data,404);
            }

            $tarea = Tarea::find($id);

            if(!$tarea){
                $data = [
                    'message' => 'la tarea no ha sido encontrada.',
                    'status'  => 404
                ];
                return response()->json($data,404);
            }

            $tarea->delete();

            $data = [
                'message' => 'la tarea ha sido eliminada.',
                'status'  => 200
            ];
            return response()->json($data,200);
        }
        catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }
    
}
