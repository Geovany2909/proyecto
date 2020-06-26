<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        $input = $request->all();

        if ($file = $request->file('photo')) {
            $originalName = $file->getClientOriginalName();
            $file->move('images', $originalName);
            $input['photo'] = $originalName;
        }

        if($input['password']){
            $input['password'] = bcrypt($request->password);
        }

        Product::create($input);
        return redirect('admin/users')->with('noticeA', 'El usuario fue creado correctamente');
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

    public function update(Request $request, $id)
    {
        $users = User::findOrfail($id);
        $input = $request->all();

        if ($file = $request->file('photo')) {
            $name = $file->getClientOriginalName();
            $file->move('images', $name);
            $input['photo'] = $name;
        }
        $users->update($input);
        return redirect('admin/users')->with('noticeU', 'El usuario ha sido actualizado exitosamente');
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
        return redirect('admin/users')->with('noticeD', 'El usuario fue eliminado correctamente');
    }
}
