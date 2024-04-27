<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Category;
use App\Models\Cloth;
use App\Models\Fabric;
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
        $data['sliders'] = Imageslider::whereIn('id', [1, 2, 3])->get();
        $data['net'] = Network::orderBy('created_at', 'desc')->get();
        $cloth = Cloth::with('type')->latest()->get();
        $fabric = Fabric::with('type')->latest()->get();
        $items = $fabric->concat($cloth)->take(9);
        $items = $items->sortByDesc('updated_at');
        return view('/site/index', $data, compact('items'));
    }
    function shop()
    {
        $data['net'] = Network::orderBy('created_at', 'desc')->get();
        $cloth = Cloth::with('type')->latest()->get();
        $fabric = Fabric::with('type')->latest()->get();
        $items = $fabric->concat($cloth);
        $items = $items->sortByDesc('updated_at');
        // dd($items);
        // exit;
        return view('/site/shop', $data, compact('items'));
    }
    function about()
    {
        $data['net'] = Network::orderBy('created_at', 'desc')->get();
        $data['about'] = About::whereIn('id', [1])->get();
        return view('/site/about', $data);
    }
    function contact()
    {
        $data['net'] = Network::orderBy('created_at', 'desc')->get();
        $data['about'] = About::whereIn('id', [1])->get();
        return view('site/contact', $data);
    }
    function fabric($id)
    {
        $data['net'] = Network::orderBy('created_at', 'desc')->get();
        $items = Fabric::with('type')->findOrFail($id);
        $relatedProduct = Fabric::with('type')->where('type_id', $items->type_id)->get();
        return view('site/item', $data, compact('items', 'relatedProduct'));
    }
    function cloth($id)
    {
        $data['net'] = Network::orderBy('created_at', 'desc')->get();
        $items = Cloth::with('type')->findOrFail($id);
        $relatedProduct = Cloth::with('type')->where('type_id', $items->type_id)->get();
        return view('site/item', $data,compact('items', 'relatedProduct'));
    }
}