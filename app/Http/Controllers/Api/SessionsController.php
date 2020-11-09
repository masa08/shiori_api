<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Requests\RegistrationFormRequest;
use App\Services\UserService;

class SessionsController extends Controller
{
    public function __construct(
        UserService $userService
    ) {
        $this->userService = $userService;
        // TODO: これは何かしらべる
        // $this->middleware('auth:api', ['except' => ['register']]);
    }

    /**
     * @param RegistrationFormRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $this->userService->create($request->all());

        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ], 401);
        }

        $user = $this->userService->getByEmail($request->input('email'));

        return $this->respondWithToken($token, $user);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ], 401);
        }

        $user = $this->userService->getByEmail($request->input('email'));

        return $this->respondWithToken($token, $user);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function logout()
    {
        try {
            auth()->logout();
            return response()->json([
                'success' => true,
                'message' => 'User logged out successfully'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ], 500);
        }
    }

    protected function respondWithToken($token, $user)
    {
        return response()->json([
            'success' => true,
            'user' => $user,
            'token_type' => 'bearer',
            'token' => $token,
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}