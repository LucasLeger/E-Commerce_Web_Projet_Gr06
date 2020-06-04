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
    public function index()
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
    public function edit(Product $products)
    {
        if (Gate::denies('edit-games'))
        {
            return redirect()->route('game.index');
        }

        return view('admin.users.edit', ['products'=>$products]);
    }
    public function destroy(Product $products)
    {
        if (Gate::denies('delete-games'))
        {
            return redirect()->route('game.index');
        }

        $products->categories()->detach();
        $products->delete();

        return redirect()->route('game.index');
    }
}
