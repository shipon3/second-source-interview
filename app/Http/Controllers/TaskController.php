<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Services\TaskService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    private TaskService $task;
    
    public function __construct(TaskService $task)
    {
        $this->task = $task;
    }
    /**
     * Display a listing of the resource.
     */
    public function index() : JsonResponse
    {
        $tasks = $this->task->get();
        if($tasks->isEmpty()){
            return response()->json(['status'=> 'error' ,'message' => 'No task found'], 404);
        }
        return response()->json(['status'=> 'success' ,'data' => $tasks], 200);
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
    public function store(TaskRequest $request)
    {
        $data = $request->validated();
        try {
            $task = $this->task->create($data);
            return response()->json(['status'=> 'success' ,'data' => $task], 201);
        } catch (Exception $e) {
            return response()->json(['status'=> 'error' ,'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task) : JsonResponse
    {
        return response()->json(['status'=> 'success' ,'data' => $task], 200);
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
    public function update(TaskRequest $request, Task $task) : JsonResponse
    {
        $data = $request->validated();
        try {
            $task = $this->task->update($task, $data);
            return response()->json(['status'=> 'success' ,'data' => $task], 200);
        } catch (Exception $e) {
            return response()->json(['status'=> 'error' ,'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task) : JsonResponse
    {
        try {
            $this->task->delete($task);
            return response()->json(['status'=> 'success' ,'message' => 'Task deleted successfully'], 200);
        } catch (Exception $e) {
            return response()->json(['status'=> 'error' ,'message' => $e->getMessage()], 500);
        }
    }

    public function complete(Task $task) : JsonResponse
    {
        try {
            $task = $this->task->complete($task);
            return response()->json(['status'=> 'success' ,'data' => $task], 200);
        } catch (Exception $e) {
            return response()->json(['status'=> 'error' ,'message' => $e->getMessage()], 500);
        }
    }

    public function incomplete(Task $task) : JsonResponse
    {
        try {
            $task = $this->task->incomplete($task);
            return response()->json(['status'=> 'success' ,'data' => $task], 200);
        } catch (Exception $e) {
            return response()->json(['status'=> 'error' ,'message' => $e->getMessage()], 500);
        }
    }

    public function getInCompleted() : JsonResponse
    {
        $tasks = $this->task->getInCompleted();
        if($tasks->isEmpty()){
            return response()->json(['status'=> 'error' ,'message' => 'No task found'], 404);
        }
        return response()->json(['status'=> 'success' ,'data' => $tasks], 200);
    }
}
