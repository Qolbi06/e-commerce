<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontEndController extends Controller
{
    public function index()
    {
        $category = Category::select('id', 'name', 'slug')->latest()->get();
        $product = Product::with('product_galleries')->select('id', 'name', 'slug', 'price')->latest()->limit(8)->get();
        
        return view('pages.FrontEnd.index', compact(
            'category',
            'product'
        ));
    }

    public function detailProduct($slug){
        
        $category = Category::select('id', 'name', 'slug')->latest()->get();
        $product = Product::with('product_galleries')->where('slug', $slug)->first();
        $recommendation = Product::with('product_galleries')->select('id', 'name', 'slug', 'price')->inRandomOrder(4)->get();
        
        return view('pages.frontend.detail-product', compact(
            'product',
            'category',
            'recommendation'
        ));
    }

    public function detailCategory($slug){
        
        $category = Category::select('id', 'name', 'slug')->latest()->get();
        $categories = Category::where('slug', $slug)->first();

        return view('pages.frontend.detail-category', compact(
            'categories',
            'category'
        ));
    }
}