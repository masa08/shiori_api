<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\User;

class UserController extends Controller
{
    public function show(Request $request)
    {
        dd('success');
    }

    public function edit(Request $request)
    {
        dd('edit');
    }

    public function update(Request $request)
    {
        dd('update');
    }

}
