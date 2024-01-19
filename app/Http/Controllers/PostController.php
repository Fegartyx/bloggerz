<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;

/**
 * paginate(7) -> untuk pagination
 * withQueryString() -> bawa query yg di kolom search bar
 */
class PostController extends Controller
{
    public function index()
    {
        $title = '';
        if (request('category')) {
            $title = 'in ' . Category::firstWhere('slug', request('category'))->name;
        }
        if (request('author')) {
            $title = 'by ' . User::firstWhere('username', request('author'))->name;
        }
        return view('posts', [
            "title" => "All Post " . $title,
            "active" => 'blog',
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            "title" => 'post ke ' . $post->slug,
            "data" => $post,
        ]);
    }
}
