<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class productsController extends Controller
{

    //solo se puede acceder a este controlador si el usuario esta autenticado
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $input = $request->validate(
            [
                'name' => 'required|max:255',
                'category' => 'required',
                'description' => 'required',
                'photo' => 'image'
            ]
        );
        if ($file = $request->file('photo')) {
            $temp_name = $this->random_string() . '.' . $file->getClientOriginalExtension();
            $file->move('images', $temp_name);
            $input['photo'] = $temp_name;
        }
        Product::create($input);
        return redirect('/admin/products')->with('noticeA', 'El usuario fue creado correctamente');
    }


    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.destroy', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $products = Product::findOrFail($id);
        $input = $request->all();
        if ($file = $request->file('photo')) {
            //verifica si anteriormente tiene una foto y procede a eliminarla para añadir una nueva
            if ($products->photo) {
                $name = $products->photo;
                $dropFile = public_path() . "/images/" . $name;
                unlink($dropFile);
            }
            
            $temp_name = $this->random_string() . '.' . $file->getClientOriginalExtension();
            $file->move('images', $temp_name);
            $input['photo'] = $temp_name;
        }

        $products->update($input);
        return redirect('admin/products')->with('noticeU', 'El producto ha sido actualizado');
    }

    public function destroy($id)
    {
        $products = Product::findOrFail($id);
        if ($products->photo) {
            $name = $products->photo;
            $dropFile = public_path() . "/images/" . $name;
            unlink($dropFile);
        }
        $products->delete();

        return redirect('admin/products')->with('noticeD', 'El producto fue eliminado correctamente');
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
