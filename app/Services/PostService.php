<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Collection;

class PostService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function create(array $data) : Post
    {
        $post = Post::create($data);
        return $post;
    }
    
    public function get() : Collection
    {
        $posts = Post::all();
        return $posts;
    }

    public function update(Post $post, array $data) : Post
    {
        $post->update($data);
        return $post;
    }

    public function delete(Post $post) : void
    {
        $post->delete();
        return;
    }
}
