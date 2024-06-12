<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('index', ['products' => $products]);
    }


    public function create()
    {
        return view('add');
    }

    public function store(CreateProductRequest $request)
    {
        $validated = $request->validated();
        $product = Product::create($validated);
        return redirect('/product')->with('success', 'Berhasil menambah data produk');
    }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('edit', ['product' => $product]);
    }

    public function update(UpdateProductRequest $request, string $id)
    {
        $validated = $request->validated();
        $product = Product::find($id);
        $product->update($validated);
        return redirect('/product')->with('success', 'Berhasil mengupdate data produk');
    }

    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        return back()->with('success', 'Berhasil menghapus data produk');
    }
}
