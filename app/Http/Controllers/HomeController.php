<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        //Nampilin kehalaman
        $headline = News::where('headline',true)->paginate(1);
        // dd(Auth::user()->id);
        $news = News::orderBy('created_at','desc')->paginate(5);
        $trends = News::orderBy('views','desc')->paginate(5);
        return view('home')->with('news',$news)->with('trends',$trends)->with('headline',$headline[0]);
    }

    public function tempReg()
    {
        return view('temp-reg');
    }

    public function insertAdditionalInformation(Request $request)
    {
        //buat ngambil user yang aktif (terlogin)
        $user = Auth::user();

        $request->validate([
            'image' => 'mimes:jpeg,jpg,png',
            'phonenumber' => 'numeric|min:9' 
        ]);

            return redirect('/');
    }
}
