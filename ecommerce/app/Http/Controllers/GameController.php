<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Category_product;
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
    public function create()
    {
        $categories = Category::all();
        return view('game.create', compact('categories'));
    }
    public function edit(Product $products)
    {
        $categories = Category::all();
        return view('game.edit', ['products'=>$products], compact('categories'));
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
        $category_product = new Category_product();
        $products->title = $request->get('title');
        $category_product->category_id = $request->get('categories_id');
        $products->slug = $request->get('title');
        $products->price = $request->get('price');
        $products->description = $request->get('description');
        $products->subtitle = $request->get('description');
        $products->image = $request->get('image');
        $products->save();
        $category_product->product_id = $products->id;
        $category_product->save();

        return redirect()->route('game.index');
    }
    public function update(Request $request, Product $products, Category $categories)
    {
        $products->title = $request->title;
        $products->slug = $request->title;
        $products->price = $request->price;
        $products->description = $request->description;
        $products->subtitle = $request->description;
        if ($request->get('image') != ""){
            $products->image = $request->get('image');
        }else{
            $products->image = $request->image;
        }
        $products->save();
        //$category_product->product_id = $products->id;
        //$category_product->save();

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
