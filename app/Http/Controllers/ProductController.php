<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use function Laravel\Prompts\alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::query()->get();
        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::query()->get();
        return view('products.form', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $imageName = uniqid() . '.' . $request->file('image')->getClientOriginalExtension();

        // Store the uploaded file in the public/images directory
        $imagePath = $request->file('image')->storeAs('images', $imageName, 'public');

        $data['imgSrc'] = $imagePath; // Save the file name as imgSrc

        $product = Product::create($data);

        return redirect()->route('products.show', $product);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $category = Category::query()->where('id', $product->category_id)->get();
        $name = $category[0]['name'];
        return view('products.show', ['product' => $product, 'name' => $name]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::query()->get();
        return view('products.edit', ['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => ['string'],
            'description' => ['string'],
            'price' => ['numeric'],
            'image' => ['image'], // Updated validation rule for image upload
            'category_id' => ['numeric']
        ]);

        if($request->hasFile('image')) {
            $imageName = uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            // Store the uploaded file in the public/images directory
            $imagePath = $request->file('image')->storeAs('images', $imageName, 'public');
            $data['imgSrc'] = $imagePath; // Save the file name as imgSrc
            unlink("storage/" . $product->imgSrc);
        }

        $product->update($data);
        
        return to_route('products.show', $product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        unlink("storage/" . $product->imgSrc);
        $product->delete();
        return to_route('products.index');
    }
}