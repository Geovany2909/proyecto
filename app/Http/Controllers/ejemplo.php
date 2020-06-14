<?php

namespace App\Http\Controllers;

use App\Foto;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class adminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //User::create($request->all());

        //se traen todos los datos del form
        $entrada = $request->all();

        //se verifica si existe una foto
        if ($archivo = $request->file('foto_id')) {
            //trae el nombre de la foto
            $nombre = $archivo->getClientOriginalName();
            //se mueve a la carpeta images de public/images
            $archivo->move('images', $nombre);

            //se agrega esta ruta la tabla de foto
            $foto = Foto::create(['ruta_foto' => $nombre]);

            //el campo de foto del form extrae el id de la tabla Foto y se asigna para ser
            //insertado en la tabla Users;
            $entrada['foto_id'] = $foto->id;
        }

        $entrada['password'] = bcrypt($request->password);

        User::create($entrada);

        return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);


        $entrada = $request->all();

        //se verifica si existe una foto
        if ($archivo = $request->file('foto_id')) {
            //trae el nombre de la foto
            $nombre = $archivo->getClientOriginalName();
            //se mueve a la carpeta images de public/images
            $archivo->move('images', $nombre);

            //se agrega esta ruta la tabla de foto
            $foto = Foto::create(['ruta_foto' => $nombre]);

            //el campo de foto del form extrae el id de la tabla Foto y se asigna para ser
            //insertado en la tabla Users;
            $entrada['foto_id'] = $foto->id;
        }
        $user->update($entrada);

        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::findOrFail($id);
        if ($user->foto) {
            $rutaOriginal = $user->foto->ruta_foto;
            $archivoOriginal = public_path() . "/images/" . $rutaOriginal;
            unlink($archivoOriginal);
        }
        Session::flash('usuario_eliminado', 'El usuario ha sido eliminado con exito');
        $user->delete();

        return redirect('admin/users');
    }
}
