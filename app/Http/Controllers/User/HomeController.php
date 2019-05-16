<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Tag;

class HomeController extends Controller
{
    public function index(){

        $posts = Post::with('tags', 'categories')
                ->where('status', '1')
                ->orderBy('created_at', 'desc')
                ->paginate(3);

        return view('user/blog', compact('posts'));
    }

    public function category(Category $category){
        
        $posts = $category->posts();

        return view('user/blog', compact('posts'));
    }

    public function tag(Tag $tag){
        
        $posts = $tag->posts();

        return view('user/blog', compact('posts'));
    }
}
