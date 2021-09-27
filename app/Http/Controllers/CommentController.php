<?php

namespace App\Http\Controllers;
use App\Comments;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $newsID)
    {       
        $comment = new Comments();
        $comment->comment = $request->input('comment');
        $comment->userid = Auth::user()->id;
        $comment->newsid = $newsID;
    
        $comment->save();

        return back();
    }

    public function destroy($id)
    {
        $comment = Comments::find($id);
        // Check User or Admin
        if(Auth::user() && auth()->user()->role != 'Admin' ||
            Auth::user() && Auth::user()->id == $comment->userid ){
            return redirect('/');
        }
        $comment->delete();
        return back();
    }
}
