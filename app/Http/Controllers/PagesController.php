<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Category;
use App\Models\Imageslider;
use App\Models\Network;
use App\Models\News;
use App\Models\Product;
use App\Models\Testimonial;
use App\Models\User;

use function Ramsey\Uuid\v1;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    function home()
    {
        $data['testimonials'] = Testimonial::orderBy('created_at', 'desc')->get();
        $data['product'] = Product::orderBy('created_at', 'desc')->take(3)->get();
        $data['news'] = News::orderBy('created_at', 'desc')->take(3)->get();
        $data['sliders'] = Imageslider::whereIn('id', [1, 2, 3])->get();
        $data['about'] = About::whereIn('id', [1])->get();
        $data['net'] = Network::orderBy('created_at', 'desc')->get();


        return view('/site/index', $data);
    }
    function shop()
    {
        $data['net'] = Network::orderBy('created_at', 'desc')->get();
        $data['about'] = About::whereIn('id', [1])->get();
        $data['testimonials'] = Testimonial::orderBy('created_at', 'desc')->get();
        $data['category'] = Category::orderBy('created_at', 'asc')->get();
        $data['products'] = Product::orderBy('created_at', 'desc')->get();
        return view('/site/shop', $data);
    }
    function about()
    {
        $data['net'] = Network::orderBy('created_at', 'desc')->get();
        $data['about'] = About::whereIn('id', [1])->get();
        $data['team'] = User::whereIn('position', ['Manager', 'Taylor'])->take(3)->get();
        $data['testimonials'] = Testimonial::orderBy('created_at', 'desc')->get();
        return view('/site/about', $data);
    }
    function contact()
    {
        $data['net'] = Network::orderBy('created_at', 'desc')->get();
        $data['about'] = About::whereIn('id', [1])->get();
        return view('site/contact', $data);
    }
    function product(Product $product)
    {
        $data['about'] = About::whereIn('id', [1])->get();
        $data['net'] = Network::orderBy('created_at', 'desc')->get();
        $data['testimonials'] = Testimonial::orderBy('created_at', 'desc')->get();
        $data['product'] = $product;
        $relatedProduct = Product::where('category', $product->category)
            ->take(3)
            ->orderBy('created_at', 'desc')
            ->get();
        $data['relatedProduct'] = $relatedProduct;
        return view('site/single-product', $data);
    }
}
