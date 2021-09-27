<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comments;
use App\User;
use App\News;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{

    public function index()
    {
        //Nampilin kehalaman
        $news = News::orderBy('created_at','desc')->paginate(5);
        $trends = $news->orderBy('views','desc')->paginate(5);
        dd($trends);
        return view('news.index')->with('news',$news)->with('trends',$trends);
    }

    public function headline(){
        if(Auth::user() && Auth::user()->role == 'Admin'){
            $news = News::orderBy('created_at','desc')->paginate(10);
            return view('news.headline')->with('news',$news);
        }else{
            return redirect('/')->with('error', 'Unauthorized');
        }
    }

    public function createHeadline(Request $request){
        // Get current headline, make sure the headline is only one
        $current = News::where('headline',true)->paginate(1);
        // dd($current[0]);
        $current[0]->headline = 0;
        $current[0]->save();
        $news = News::find($request->input('news'));
        // create new headline
        $news->headline = true;
        $news->save();
        return redirect('/');
    }

    public function create()
    {
        //registrasi
        //Variable, Model(berhubungan dengan DB), pluck(ngambil sebagian)
        $category = Category::pluck('name', 'id');
        return view('news.create')->with('categories', $category);
    }

    public function store(Request $request)//$request itu POST
    {
        //Ngisi ke database (validasi request)
        //Sama name di Blade
        $this->validate($request,[
            'title' => 'required',
            'content' => 'required',
        ]);

        $news = new News();
        
        // create news
        // Handle Image
        // Please run this first => php artisan storage:link
        if($request->hasFile('image')){
            // Get filename with extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            // split file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // extenstion
            $ext = $request->file('image')->getClientOriginalExtension();
            // filename
            $fileNameStore = $fileName.'_'.time().'.'.$ext;
            // add image
            $path = $request->file('image')->storeAs('public/images',$fileNameStore);
            $news->image = $fileNameStore;
        }else{
            $fileName = 'null';
            $news->image = $fileName;
        }

        //database, validate request
        $news->title = $request->input('title');
        $news->content = $request->input('content');
        $news->category_id = $request->input('category');
        $news->url = $request->input('title');
        $news->video = $request->input('video');
        
        $news->save();

        return redirect('/');
    }

    public function show($id)
    {

        $news = News::find($id); 
        $news->views = $news->views +1;
        $news->save();
        $comments = Comments::where('newsid',$news->id)->orderBy('created_at','desc')->paginate(5);
        // run this for embed youtube "composer require bensampo/laravel-embed" 
        return view('news.show')->with('news', $news)->with('comments',$comments);
    }

    public function edit($id)
    {
       $news = News::find($id);
        // Check User or Admin
        if(Auth::user() && auth()->user()->role != 'Admin'){
            return redirect('/')->with('error', 'Unauthorized');
        }
        return view('news.edit')->with('news',$news);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'content' => 'required',
        ]);

        if($request->hasFile('image')){
            // Get filename with extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            // split file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // extenstion
            $ext = $request->file('image')->getClientOriginalExtension();
            // filename
            $fileNameStore = $fileName.'_'.time().'.'.$ext;
            // add image
            $path = $request->file('image')->storeAs('public/images',$fileNameStore);
        }

        // update article
        $news = News::find($id);
        $news->title = $request->input('title');
        $news->content = $request->input('content');
        $news->category_id = $request->input('category');
        if($request->hasFile('image')){
            $news->image = $fileNameStore;
        }
        $news->save();

        return redirect('/')->with('success', 'news Updated');
    }

    public function destroy($id)
    {
        $news = News::find($id);
        // Check User or Admin
        if(Auth::user() && auth()->user()->role != 'Admin'){
            return redirect('/')->with('error', 'Unauthorized');
        }
        if($news->image != 'null'){
            Storage::delete('public/images/'.$news->image);
        }
        $news->delete();
        return redirect('/')->with('success', 'News Deleted');
    }

    public function categories($name){
        $category = Category::where('name',$name)->first();
        $news = News::where('category_id', $category->id)->paginate(5);
        return view('news.index')->with('news',$news)->with('category',$category);
    }

}
