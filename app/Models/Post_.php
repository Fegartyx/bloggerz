<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsCollection;
use Nette\Utils\Arrays;
use Stringable;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class Post
{
    // use HasFactory;

    private static $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Sandhika Galih",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque, nihil. Esse vel nisi excepturi hic impedit natus aliquid tenetur eius nulla maxime. Repudiandae eveniet libero sapiente, voluptatem quasi perspiciatis maiores."
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Sandhika Dodi",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque, nihil. Esse vel nisi excepturi hic impedit natus aliquid tenetur eius nulla maxime. Repudiandae eveniet libero sapiente, voluptatem quasi perspiciatis maiores."
        ],
    ];

    public static function all()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $posts = static::all();
        // $post = [];
        // foreach ($posts as $p) {
        //     if ($p['slug'] === $slug) {
        //         $post = $p;
        //     }
        // }
        return $posts->firstWhere('slug', $slug);
    }
}
