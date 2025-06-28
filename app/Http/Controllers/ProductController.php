<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $data = [
            'products' => $products
        ];
        return view('admin.products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //PRENDO TUTTI I DATI
        // $data = $request->all();
        // Qui abbiamo la validazione
        $data = $request->validate([
            "brand" => "required|min:1|max:100",
            "model" => "required",
            "type" => "required",
            "size_ml" => "required",
            "price" => "required",
            "img" => "required|image",
        ]);

        if ($request->has('img')) {
            // una volta online, storage:put non funziona
            //$img_path = Storage::put('img', $request['img']);
            $img_path = $request->file('img')->store('img', 'public');
            $data['img'] = $img_path;
        }
        //CREO L'OGGETTO
        $newProduct = new Product();

        //POPOLO L'OGGETTO CREANDO L'ISTANZA
        $newProduct->fill($data);

        //SALVO SUL DB
        $newProduct->save();

        //RITORNO LA ROTTA
        // return redirect()->route('products.index');
        return redirect()->route('admin.products.show', $newProduct->id)->with('message', 'Product Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $data = [
            "product" => $product,
        ];
        return view('admin.products.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $data = [
            "product" => $product,
        ];
        return view('admin.products.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {

        $data = $request->validate([
            "brand" => "required|min:1|max:100",
            "model" => "required",
            "type" => "required",
            "size_ml" => "required",
            "price" => "required",
            "img" => $product->img ? 'nullable|image|mimes:jpeg,png,jpg,webp' : 'required|image|mimes:jpeg,png,jpg,webp'
        ]);
        if ($request->has('img')) {

            $img_path = Storage::put('img', $request['img']);
            $data['img'] = $img_path;
            if ($product->img && !Str::startsWith($product->img, 'http')) {
                // not null and not startingn with http
                Storage::delete($product->img);
            }
            //dd($data['img']);
        } elseif (!$request->has('img') && $product['img']) {
            $data['img'] = $product['img'];
        }
        $product->update($data);

        return redirect()->route('admin.products.show', $product->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $product = Product::findOrFail($id);
        Storage::delete($product->img);
        $product->delete();

        return redirect()->route('admin.products.index')->with('message', 'Product Deleted');
    }
}
