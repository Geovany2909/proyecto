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
        $input = $request->validate(
            [
                'name'=> 'required|max:255',
                'category'=>'required',
                'description'=> 'required',
                'photo'=>'image'
            ]
        );
       $input = $request->all();
        if ($file = $request->file('photo')) {
            $originalName = $file->getClientOriginalName();
            $file->move('images', $originalName);
            $input['photo'] = $originalName;
            // $photo = Foto::create(['ruta_foto' => $nombre]);
            // $entrada['foto_id'] = $foto->id;
        }
        Product::create($input);
        return redirect('/admin/products')->with('noticeA', 'El usuario fue creado correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.destroy', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));

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
        $products = Product::findOrFail($id);
        $input = $request->all();

        if ($file = $request->file('photo')) {
            $name = $file->getClientOriginalName();
            $file->move('images', $name);
            $input['photo'] = $name;
        }

        $products->update($input);
       return redirect('admin/products')->with('noticeU', 'El producto ha sido actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::findOrFail($id);
        if($products->photo){
            $originalRut = $products->photo;
            $originalFile = public_path(). "/images/". $originalRut;
            unlink($originalFile);
        }
        $products->delete();
        return redirect('admin/products')->with('noticeD', 'El producto fue eliminado correctamente');
    }
}
