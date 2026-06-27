<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClientReview;
use App\Models\Blog;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $frontSetting = getFrontSettingValue('Home');
        
        $clientReview = ClientReview::get();

        $blogs = Blog::latest()->take(3)->get();

        return view('front.home', compact('frontSetting', 'clientReview', 'blogs'));
    }

    public function smartTools()
    {
        $frontSetting = getFrontSettingValue('SmartTools');
        
        return view('front.smart-tools', compact('frontSetting'));
    }
}
