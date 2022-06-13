<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $articles = Article::when(isset(request()->search),function ($q){
            $q->orwhere('title','Like','%'.request()->search.'%')->orwhere('description','Like','%'.request()->search.'%');
        })->with(['user','category'])->latest('id')->paginate(5);
        return view('welcome',compact('articles'));
    }

    public function detail($slug){
        $article = Article::where('slug',$slug)->first();
        return view('blog.detail',compact('article'));
    }

    public function baseOnCategory($id)
    {
        $articles = Article::when(isset(request()->search),function ($q){
            $q->orwhere('title','Like','%'.request()->search.'%')->orwhere('description','Like','%'.request()->search.'%');
        })->where('category_id',$id)->with(['user','category'])->latest('id')->paginate(5);
        return view('welcome',compact('articles'));
    }

    public function baseOnUser($id){
        $articles = Article::where('user_id',$id)->when(isset(request()->search),function ($q){
            $q->orwhere('title','Like','%'.request()->search.'%')->orwhere('description','Like','%'.request()->search.'%');
        })->with(['user','category'])->latest('id')->paginate(5);
        return view('welcome',compact('articles'));
    }
}
