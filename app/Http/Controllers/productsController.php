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
        return view('admin.products.index', ['products'=>$products]);
        // return view('admin.products.index', compact($products));
    }

    public function create()
    {
        return view('admin.products.create');
    }


    public function store(Request $request)
    {
       $input = $request->all();

        if ($file = $request->file('photo')) {
            $originalName = $file->getClientOriginalName();
            $file->move('images', $originalName);
            $input['photo'] = $originalName;
            // $photo = Foto::create(['ruta_foto' => $nombre]);
            // $entrada['foto_id'] = $foto->id;
        }
        Product::create($input);
        return redirect('/admin/products');

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

        $product = Product::findOrFail($id);
        return view('admin.products.edit', ['product'=>$product]);
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
        $products = Product::findOrfail($id);

        $input = $request->all();

        if ($file = $request->file('photo')) {
            $name = $file->getClientOriginalName();
            $file->move('images', $name);
            $input['photo'] = $name;
        }

        $products->update($input);
        return redirect('/admin/products');
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
        return redirect('admin/products');
    }
}
