<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Отображение всех товаров
    public function index()
    {
        $products = Product::all();
        return view('shop.index', compact('products'));
    }

    // Отображение одного товара
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('shop.show', compact('product'));
    }
}
