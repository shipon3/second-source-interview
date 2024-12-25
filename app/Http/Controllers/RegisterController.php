<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Services\RegisterService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    private RegisterService $register;

    public function __construct(RegisterService $register)
    {
        $this->register = $register;
    }

    public function register(RegisterRequest $request) : JsonResponse
    {
        $data = $request->validated();
        try {
            $user = $this->register->register($data);
            return response()->json(['status' => 'success', 'data' => $user], 201);
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
}
