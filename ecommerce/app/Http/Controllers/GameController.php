<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class GameController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Product $products)
    {
        if (request()->categorie) {
            $products = Product::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->categorie);
            })->paginate(6);
        } else {
            $products = Product::with('categories')->paginate(6);
        }
        return view('game.index')->with('products', $products);
    }
    public function create(Product $products)
    {
        return view('game.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'price' => ['required'],
            'description' => ['required'],
            'image' => ['required']
        ]);

        $products = new Product();
        $products->title = $request->get('title');
        $products->price = $request->get('price');
        $products->description = $request->get('description');
        $products->image = $request->get('image');
        $products->save();

        return redirect()->route('game.index');
    }
    public function edit(Product $products)
    {
        return view('game.edit', ['products'=>$products]);
    }
    public function update(Request $request, Product $products)
    {
        $products->title = $request->title;
        $products->price = $request->price;
        $products->description = $request->description;
        if ($request->get('image') != ""){
            $products->image = $request->get('image');
        }else{
            $products->image = $request->image;
        }
        $products->save();

        return redirect()->route('game.index');
    }
    public function destroy(Product $products, $id)
    {
        $products = Product::find($id);
        $products->categories()->detach();
        $products->delete();

        return redirect()->route('game.index');
    }
}
