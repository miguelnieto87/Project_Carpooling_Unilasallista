<?php

namespace App\Http\Controllers;
use App\Models\Usuarios;
use Illuminate\Http\Request;


class UsuariosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function Lista(){

       //Select * from usuarios
       $datos = Usuarios::get(); //Mostrar todos los usuarios

        return response()->json(['datos'=>$datos]); //Enviar los datos de los usuarios por json

    }

    public function Login(Request $request){
        //Capturamos los parametros
        $usuario = $request->input('usuario');
        $contrasena =  md5($request->input('contrasena'));

        //Select * from usuarios where usuario=$usuario and contrasena=$contrasena

        $login = Usuarios::where('usuario',$usuario)->where('contrasena',$contrasena)->first();


        if($login){ //Si el usuario y contrase;a existe
            return response()->json([
                'msg'=>"Acceso correcto", //Muestra el mensaje
                "flaq"=>true,
                'datos'=>$login            //Muestra los datos
            ]);
        }
        else{ //Sino existe el usuario y contrasena
            return response()->json([
                'msg'=>"Error de acceso",
                'flaq'=>false
            ]);

        }


    }

    public function Registrar(Request $request){
        //Validamos todos los campos
        $this->validate($request, [
            'usuario' => 'required',
            'contrasena' => 'required',
            'nombres' => 'required',
            'apellidos' => 'required',
            'estamento' => 'required|numeric'
        ]);

        //Insertamos un registro

        $insertar = new Usuarios;
        $insertar->usuario = $request->input('usuario');
        $insertar->contrasena = md5($request->input('contrasena'));
        $insertar->nombres = $request->input('nombres');
        $insertar->apellidos = $request->input('apellidos');
        $insertar->estamento = $request->input('estamento');
        $insertar->fecha_nacimiento = $request->input('fecha_nacimiento');
        $insertar->save();

        return response()->json([
            'msg'=>'Usuario registrado',
        ]);




    }

    //
}
