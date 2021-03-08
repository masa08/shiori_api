<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UserService;

class SessionsController extends Controller
{
    public function __construct(
        UserService $userService
    ) {
        $this->userService = $userService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $user = $this->userService->getByEmail($request->input('email'));

        return response()->json([
            'user' => $user,
        ]);
    }
}
