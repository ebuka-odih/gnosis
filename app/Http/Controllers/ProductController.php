<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.product.list', compact('products'));
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'price' => 'required',
            'size' => 'nullable',
            'stock' => 'nullable',
            'type' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/files');
            $image->move($destinationPath, $input['imagename']);

            $product = new Product();
            $product->name = $request->name;
            $product->price = $request->price;
            $product->size = $request->size;
            $product->stock = $request->stock;
            $product->type = $request->type;
            $product->image = $input['imagename'];
            $product->save();
            return redirect()->back()->with('success', "Item Added Successfully");
        }
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->size = $request->size;
        $product->type = $request->type;
        $product->save();
        return redirect()->back()->with('success', "Item Added Successfully");
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.view', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/files');
            $image->move($destinationPath, $input['imagename']);

            $product->update(['image' => $input['imagename']]);
            $data = $this->getData($request);
            $product->update($data);
            return redirect()->route('admin.product.index')->with('updated', 'Product updated ');
        }
         $product->update($this->getData($request));
        return redirect()->route('admin.product.index')->with('updated', 'Product updated ');
    }

    protected function getData(Request $request)
    {
        $rules = [
            'name' => 'nullable',
            'price' => 'nullable',
            'size' => 'nullable',
            'type' => 'nullable',
            'stock' => 'nullable',
        ];
        return $request->validate($rules);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->back()->with('deleted', "Item deleted");
    }

}
