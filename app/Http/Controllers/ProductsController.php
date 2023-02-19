<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('dashboard.products.index', [
            'products' => $products
        ]);
    }

    // qikjo ti kthen veq prej kategoris me id qe ja ke jep
    public function getProductsByCategory($id) {
        $products = Product::where('category_id', $id).get();
        return view('dashboard.products.index')->with('products', $products);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('dashboard.products.create')->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'qty' => 'required',
            'price' => 'required',
            'storage' => 'required',
            'color' => 'required',
            'description' => 'required',
            'image' => 'required',
            'category_id' => 'required',
        ]);

        $data = $request->only(['name','qty','price','storage','color','description','image','category_id']);
        $data['user_id'] = Auth::id();

        if($request->hasfile('image')) {
            // rename
            $file = $request['image']->getClientOriginalName();
            $name = pathinfo($file, PATHINFO_FILENAME);
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $image = time().'-'.$name.'.'.$ext;

            Storage::putFileAs('public/products/', $request['image'], $image);
            $data['image'] = $image;
        }

        if(Product::create($data)) {
            return redirect()->route('products.index')->with('status', 'Slide was created successfully.');
        }

        return redirect()->back()->with('status', 'Something want wrong!');
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
        $comments = $product->comments()->get();


        return view ('view-product', compact('product', 'comments'));
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
        return view ('dashboard.products.edit', compact('product'));
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
        $request->validate([
            'name' => 'required',
            'qty' => 'required',
            'price' => 'required',
            'storage' => 'required',
            'color' => 'required',
            'description' => 'required',
        ]);

        $data = $request->only(['name','qty','price','storage','color','description']);
        $product = Product::findOrFail($id);

                if($request->hasfile('image')) {
                    // rename
                    $file = $request['image']->getClientOriginalName();
                    $name = pathinfo($file, PATHINFO_FILENAME);
                    $ext = pathinfo($file, PATHINFO_EXTENSION);
                    $image = time().'-'.$name.'.'.$ext;

                    Storage::putFileAs('public/products/', $request['image'], $image);
                    $product->image = $image;
                }


        $product->name = $request->name;
        $product->qty = $request->qty;
        $product->price = $request->price;
        $product->storage = $request->storage;
        $product->color = $request->color;
        $product->description = $request->description;


        if($product->save()) {
            return redirect()->route('products.index')->with('status', 'Product was updated successfully.');
        }

        return redirect()->back()->with('status', 'Something want wrong!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product successfully deleted.');
    }
}
