<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function comments()
    {

        return $this->hasMany(Comment::class);
    }


    public function path()
    {
        return route('post.show',$this);
    }


    public function scopeFilter($query, array $filters)
    {
        return $query
            ->when( $filters['search'] ?? false ,function($q,$search) {
                // dd($search);
                $q->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%');
            })
            ->when($filters['category'] ?? false,function($q,$category){

                // $q->whereExists(function($innerQuery) use($category){
                //     $innerQuery->from('categories')
                //         ->whereColumn('categories.id', 'posts.category_id')
                //         ->where('categories.slug',$category );
                // });

                $q->whereHas('category', function($innerQuery) use ($category){
                    $innerQuery->where('slug',$category);
                });
            })
            ->when( $filters['author'] ?? false ,function($q,$author) {
                $q->whereHas('author', function ($innerQuery) use ($author) {
                    $innerQuery->where('username', $author);
                });
            });

    }




}
