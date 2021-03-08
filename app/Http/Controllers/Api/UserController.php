<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\UserService;

class UserController extends Controller
{
    public function __construct(
        UserService $userService
    ) {
        $this->userService = $userService;
    }

    public function show($id)
    {
        $user = $this->userService->getByIdWithSentence($id);

        return response()->json([
            'user' => $user,
        ]);
    }

    public function store(Request $request)
    {
        $user = $this->userService->create($request->all());

        return response()->json([
            'user' => $user,
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = $this->userService->update($request->all, $id);

        return response()->json(['user' => $user]);
    }
}
