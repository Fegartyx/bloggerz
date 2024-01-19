<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    use Sluggable;

    protected $guarded = ['id'];

    public function post()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Setiap Route akan otomatis mencari slug bukan id
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
