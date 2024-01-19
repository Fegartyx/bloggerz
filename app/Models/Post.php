<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    use Sluggable;

    // protected $fillable = ['title', 'excerpt', 'body'];
    protected $guarded = ['id'];
    protected $with = ['author', 'category'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class); // satu post hanya boelh satu category
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeFilter($query, array $filters)
    {
        // if (isset($filters['search']) ? $filters['search'] : false) {
        //     return $query->where('title', 'LIKE', '%' . $filters['search'] . '%')->orWhere('body', 'LIKE', '%' . $filters['search'] . '%');
        // }

        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('title', 'LIKE', '%' . $search . '%')->orWhere('body', 'LIKE', '%' . $search . '%');
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        $query->when($filters['author'] ?? false, function ($query, $author) {
            return $query->whereHas('author', function ($query) use ($author) {
                $query->where('username', $author);
            });
        });
    }

    /**
     * Setiap Route akan otomatis mencari slug bukan id
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
// App\Models\Post::create([
// 'title' => 'Judul Pertama',
// 'slug' => 'judul-pertama',
// 'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius nemo,',
// 'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius nemo,</p><p>deleniti obcaecati tempore repellat doloribus debitis error veritatis, quaerat minus qui ut ab laborum molestiae numquam reprehenderit corporis provident. Porro.</p>'
// ])
