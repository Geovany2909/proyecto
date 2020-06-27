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
        $input = $request->validate([
            'name'=>['required', 'max:100'],
            'email'=>['required', 'regex:/^.+@.+$/i', 'unique:users,email'],
            "password"=>['required', 'min:8'],
            "repeat_password"=>['required', 'same:password'],
            'photo'=> 'mimes:jpeg,bmp,png,jpg'
        ]);

        if ($file = $request->file('photo')) {
            $temp_name = $this->random_string() . '.' . $file->getClientOriginalExtension();
            $file->move('images', $temp_name);
            $input['photo'] = $temp_name;
        }
        $input['password'] = bcrypt($request->password);
        User::create($input);

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
