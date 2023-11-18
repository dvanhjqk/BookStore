<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function index(){
        $comment =  Comment::all();
        $product = DB::table('products')
        ->select('id', 'pro_name')
        ->get();
        $user = DB::table('users')
        ->select('id', 'name')
        ->get();
    return view('admin/comment.index', compact('comment','product','user'));
    }
    public function delete($id)
    {
        Comment::where('id', $id)->delete();
      
        return redirect()->route('comment_index');
    }
}
