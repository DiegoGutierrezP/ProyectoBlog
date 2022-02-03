<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::where('status',2)->latest('id')->paginate(8);
        return view('posts.index',compact('posts'));
    }

    public function show(Post $post){

        //policy.solo muestra los post en estado 2
        $this->authorize('published',$post);
        //

        $similares = Post::where('category_id',$post->category_id)->where('status',2)
                                                                    ->where('id','!=',$post->id)
                                                                    ->latest('id')
                                                                    ->take(4)
                                                                    ->get();

        return View('posts.show',compact('post','similares'));
    }

    public function category(Category $category){
        $posts = Post::where('category_id',$category->id)->where('status',2)->latest('id')->paginate(6);
        return View('posts.category',compact('posts','category'));
    }

    public function tag(Tag $tag){
        $posts = $tag->posts()->where('status',2)->latest('id')->paginate(4);
        return View('posts.tag',compact('posts','tag'));

    }
}
