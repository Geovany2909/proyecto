<?php

namespace App\Http\Controllers;

use App\Product;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\ValidateFormProducts;

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


    public function store(ValidateFormProducts $request)
    {
        $input = $request->all();
        if($file = $request->file('photo')){
            $temp_name = $this->random_string() . '.' . $file->getClientOriginalExtension();
            $img = \Image::make($file);
            $img->resize(320, 240)->save(public_path('images/'.$temp_name));
            $input['photo'] = $temp_name;
        }
        Product::create($input);
        Alert::success('Creado', 'El Producto se creo');
        return redirect()->route('products.index');
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

    public function update(ValidateFormProducts $request, $id)
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
                $img = \Image::make($file);
                $img->resize(320, 240)->save(public_path('images/' . $temp_name));
                $input['photo'] = $temp_name;
            }

            $products->update($input);
            Alert::info('Actualizado', 'El producto ha sido actualizado');
            return redirect()->route('products.index');
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
        Alert::error('Eliminado', 'El producto se ha eliminado');
        return redirect('admin/products');
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
