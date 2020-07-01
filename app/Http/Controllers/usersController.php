<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\ValidateFormUsers;

class usersController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(ValidateFormUsers $request)
    {
        $input = $request->all();

        if ($file = $request->file('photo')) {
            $temp_name = $this->random_string() . '.' . $file->getClientOriginalExtension();
            $file->move('images', $temp_name);
            $input['photo'] = $temp_name;
        }

        $input['password'] = bcrypt($request->password);
        
        User::create($input);
        Alert::success('Agregado', 'El usuario se ha agregado correctamente');
        return redirect()->route('users.index');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.destroy', compact('user'));
    }

    public function edit($id)
    {
        $users = User::findOrFail($id);
        return view('admin.users.edit', compact('users'));
    }

    public function update(ValidateFormUsers $request, $id)
    {
        $users = User::findOrfail($id);
        $input = $request->all();

        if ($file = $request->file('photo')) {
            if ($users->photo) {
                $originalRut = $users->photo;
                $originalFile = public_path() . "/images/" . $originalRut;
                unlink($originalFile);
            }

            $temp_name = $this->random_string() . '.' . $file->getClientOriginalExtension();
            $file->move('images', $temp_name);
            $input['photo'] = $temp_name;
        }
        $users->update($input);
        Alert::info('Actualizado', "El usuario '$users->name ha sido actualizado exitosamente");
        return redirect('admin/users');
    }

    public function destroy($id)
    {
        $users = User::findOrFail($id);
        if ($users->photo) {
            $originalRut = $users->photo;
            $originalFile = public_path() . "/images/" . $originalRut;
            unlink($originalFile);
        }
        $users->delete();
        Alert::error('Eliminado', "El usuario '$users->name' fue eliminado  correctamente");
        return redirect()->route('users.index');
    }

    protected function random_string()
    {
        $key = '';
        $keys = array_merge(range('a', 'z'), range(0, 15));
        for ($i = 0; $i < 15; $i++) {
            $key .= $keys[array_rand($keys)];
        }
        return $key;
    }
}
