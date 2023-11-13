<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::where('status',2)->latest('id')->paginate(8);
        /**borrar esto */
        // $colors = ['red', 'yellow', 'green', 'blue', 'indigo', 'purple', 'pink'];
        // $tags = Tag::all();
        // foreach ($tags as  $tag) {
        //     $tag->color = $colors[rand(0,7)];
        //     $tag->save();
        // }
        // dd($categorias);
        return view('blog.posts.index')->with(compact('posts'));
    }

    public function show(Post $post) {
        $this->authorize('published', $post);
        $similares = Post::where('category_id', $post->category_id)
                         ->where('status', 2)
                         ->where('id','!=', $post->id)
                         ->latest('id')
                         ->take(4)
                         ->get();
        return view('blog.posts.show')->with(compact('post', 'similares'));
    }
    public function category(Category $category) {
        $posts = Post::where('category_id', $category->id)
                        ->where('status',2)
                        ->latest('id')
                        ->paginate(4);
        return view('blog.posts.category')->with(compact('posts', 'category'));
    }

    public function tag(Tag $tag) {
        $posts = $tag->posts()->where('status', 2)->latest('id')->paginate(4);
        return view('blog.posts.tag')->with(compact('posts', 'tag'));
    }
}
