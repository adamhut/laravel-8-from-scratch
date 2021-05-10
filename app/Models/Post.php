<?php 
namespace App\Models;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Post{

    
    public $title;
    public $excerpt;
    public $date;
    public $body;
    
    

    public $slug;

    public function __construct($title,$excerpt,$date,$body, $slug)
    {
        $this->title  = $title;
        $this->excerpt  = $excerpt;
        $this->date  = $date;
        $this->body  = $body;
        $this->slug = $slug;
    }

    public static function find($slug)
    {
        
        $path = resource_path("posts/{$slug}.html");

        if (!file_exists($path)) {
            throw new ModelNotFoundException();
        }

        return  Cache::remember("posts.{$slug}", now()->addMinutes(5), function () use ($path) {
            return file_get_contents($path);
        });
    }

    public static function all()
    {
        $path = resource_path("posts");

        $files = File::files($path);
        return array_map(function($file){
            return $file->getContents();
        },$files);
    }




}