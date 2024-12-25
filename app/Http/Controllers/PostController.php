<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Services\PostService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Js;

class PostController extends Controller
{
    private PostService $post;

    public function __construct(PostService $post)
    {
        $this->post = $post;
    }
    /**
     * Display a listing of the resource.
     */
    public function index() : JsonResponse
    {
        $posts = $this->post->get();
        if($posts->isEmpty()){
            return response()->json(['status'=> 'error' ,'message' => 'No post found'], 404);
        }
        return response()->json(['status'=> 'success' ,'data' => $posts], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request) : JsonResponse
    {
        $data = $request->validated();
        try {
            $post = $this->post->create($data);
            return response()->json(['status'=> 'success' ,'data' => $post], 201);
        } catch (Exception $e) {
            return response()->json(['status'=> 'error' ,'message' => $e->getMessage()], 500);
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post) : JsonResponse
    {
        return response()->json(['data' => $post], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post) : JsonResponse
    {
        $data = $request->validated();
        try {
            $post = $this->post->update($post, $data);
            return response()->json(['status'=> 'success' ,'data' => $post], 200);
        } catch (Exception $e) {
            return response()->json(['status'=> 'error' ,'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post) : JsonResponse
    {
        try {
            $post = $this->post->delete($post);
            return response()->json(['status'=> 'success' ,'message' => 'Data deleted successfull'], 200);
        } catch (Exception $e) {
            return response()->json(['status'=> 'error' ,'message' => $e->getMessage()], 500);
        }
    }
}
