<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::query()

            ->when($request->input('name'), function($query, $name) {
                return $query->where('name', 'like', "%$name%");
            })

            ->orderBy('id', 'desc')
            // Membatasi hasil menjadi 10 data per halaman
            ->paginate(10);

        // Menampilkan view 'pages.products$products.index' dengan data products$products
        return view('pages.products.index', compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // // dd($request->all());
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg,heic,PNG,JPG,JPEG,HEIC|max:2048'
        ]);

        $filename = time() . '.' . $request->image->extension();
        $request->image->storeAs('products', $filename,'public');

        // $filename =$request->file('image')->store('products','public');

        $data = $request->all();
        $data['image'] = $filename;

        Product::create($data);

        return redirect()->route('product.index',)->with('success', 'product created successfully');

        // Lanjutkan proses penyimpanan data jika validasi berhasil
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return  view('pages.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->all();

        $product->update($data);


        return redirect()->route('product.index')->with('success', 'product edit successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
       $product->delete();

       return redirect()->route('product.index')->with('success', 'product deleted successfully');
    }
}
