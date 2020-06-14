<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class productsController extends Controller
{

    public function index()
    {
        $productos = Product::all();
        return view('admin.products.index', compact($productos));
    }

    public function create()
    {
        return view('admin.products.create');
    }


    public function store(Request $request)
    {
       $input = $request->all();

        if ($file = $request->file('photo')) {
            $name = $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Product::create([
                'photo' => $name
            ]);

            $input['photo'] = $photo;
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

        $product = Product::finOrFail($id);
        return view('admin.products.edit', compact($product));
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
        $products = Product::finOrfail($id);

        $input = $request->all();

        if ($file = $request->file('photo')) {
            $name = $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Product::create([
                'photo' => $name
            ]);

            $input['photo'] = $photo;
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
        // $user = User::findOrFail($id);
        // if ($user->foto) {
        //     $rutaOriginal = $user->foto->ruta_foto;
        //     $archivoOriginal = public_path() . "/images/" . $rutaOriginal;
        //     unlink($archivoOriginal);
        // }
        // Session::flash('usuario_eliminado', 'El usuario ha sido eliminado con exito');
        // $user->delete();

        // return redirect('admin/users');
    }
}
