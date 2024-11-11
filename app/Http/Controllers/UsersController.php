<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index() {
        $usuarios = User::all();
        return view( 'admin.users.index',['usuarios'=>$usuarios,compact('usuarios')]);
    }

    public function create() {
        return view( 'admin.users.create');
    }

    public function store(Request $request) {
        //$datos = request() ->all();
        //return response() -> json($datos);
        $request->validate([
            'name'=> 'required|max:250',
            'email'=> 'required|max:250|unique:users',
            'password'=> 'required|max:250|confirmed'

        ]);

        $usuario = new User();
        $usuario-> name = $request->name;
        $usuario-> email = $request->email;
        $usuario-> password = $request->password;
        $usuario->save();

        return redirect() ->route ('admin.users.index')
            ->with('mensaje','Se ha registrado correctamente.')
            ->with('icono','success');
    }    
    

    public function show($id){
        $usuario = User::findorFail($id);
        return view('admin.users.show',compact('usuario'));
    }

    public function edit($id){
        $usuario = User::findorFail($id);
        return view('admin.users.edit',compact('usuario'));
    }

    public function update(Request $request, $id){
        $usuario = User::find($id);
        
        $request->validate([
            'name'=> 'required|max:250',
            'email'=> 'required|max:250|unique:users,email,'.$usuario->id,
            'password'=>  'nullable|max:250|confirmed'
        ]);

       
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        if($request->filled('password')){
            $usuario->password = $request->password;
        }
        $usuario -> save();

        return redirect() ->route ('admin.users.index')
        ->with('mensaje','Se ha actualizado correctamente.')
        ->with('icono','success');
    }

    public function confirmDelete($id){
        $usuario = User::findorFail($id);
        return view('admin.users.delete',compact('usuario'));
    }

    public function destroy($id) {
        User::destroy($id);
        return redirect() ->route ('admin.users.index')
        ->with('mensaje','Se ha elimado correctamente.')
        ->with('icono','success');
    }
}
