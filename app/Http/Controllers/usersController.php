<?php

namespace App\Http\Controllers;

use App\User;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\ValidateFormUsers;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class usersController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $users = User::orderBy('name', 'desc')->get();
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
            $img = \Image::make($file);
            $img->resize(320, 240)->save(public_path('images/' . $temp_name));
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

    public function update(UpdateUserRequest $request, $id)
    {
        $input = $request->only('name', 'email', 'photo');
        $pass = $request->input('password');
        $credentials = Auth::user();
        $users = User::findOrfail($id);

           if (Hash::check($pass, $credentials->getAuthPassword())) {
            if ($file = $request->file('photo')) {
                if ($users->photo) {
                    $originalRut = $users->photo;
                    $originalFile = public_path() . "/images/" . $originalRut;
                    unlink($originalFile);
                }

                $temp_name = $this->random_string() . '.' . $file->getClientOriginalExtension();
                $img = \Image::make($file);
                $img->resize(320, 240)->save(public_path('images/' . $temp_name));
                $input['photo'] = $temp_name;
            }
            $users->update($input);
            Alert::info('Actualizado', "El usuario $users->name ha sido actualizado exitosamente");
            return redirect('admin/users');
           } else{
                Alert::error('Error', 'La contraseña es incorrecta');
               return redirect()->route('users.edit',$users->id);
           }
            // $users->update($input);




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
