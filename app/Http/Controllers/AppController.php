<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Homepage;
use App\Testimonial;
use App\Shop;
use App\About;
use App\Contact;
use App\Product;

class AppController extends Controller
{
    public function index(){
        return redirect('/admin');
    }

    public function getHomePageData(){
        if(Homepage::find(1)->video)
        {
            $video = json_decode(Homepage::find(1)->video);        
            $data['bannervideo'] = $video[0]->download_link;
        }
        $data['content'] = Homepage::find(1)->makeHidden(['id','created_at','updated_at']);
        $data['shop'] = Shop::getData()->take(6)->orderBy('order')->get()->makeHidden(['id','created_at','updated_at','order']);
        $data['testimonial'] = Testimonial::all()->makeHidden(['id','created_at','updated_at','order']);
        $data['about'] = About::getData()->orderBy('order')->get()->makeHidden(['id','created_at','updated_at','order']);
        return response([
            'message'=> "Data Fetched Successfully",
            'data'=> $data
        ],200);
    }

    public function getAboutUsData(){
        $data = [];
        $about = &$data['about'];
        $about['basic'] = About::getBasicData()->first();
        $about['items'] = About::getData()->orderBy('order')->get()->makeHidden(['id','created_at','updated_at','order']);
        return response([
            'message'=> "Data Fetched Successfully",
            'data'=> $data
        ],200);
    }
    
    public function getShopData(){
        $data = [];
        $shop = &$data['shop'];
        $shop['basic'] = Shop::getBasicData()->first();
        $shop['items'] = Shop::getData()->orderBy('order')->get()->makeHidden(['id','created_at','updated_at','order']);
        return response([
            'message'=> "Data Fetched Successfully",
            'data'=> $data
        ],200);
    }

    public function getContactData(){
        $data['contact'] = Contact::where('id',1)->first()->makeHidden(['id','created_at','updated_at']);
        return response([
            'message'=> "Data Fetched Successfully",
            'data'=> $data
        ],200);
    }

    public function getProductData(){
        $data = [];
        $product = &$data['product'];
        $product['basic'] = Product::getBasicData()->first();
        $product['items'] = Product::getData()->orderBy('order')->get()->makeHidden(['id','created_at','updated_at','order']);
        return response([
            'message'=> "Data Fetched Successfully",
            'data'=> $data
        ],200);
    }
}
