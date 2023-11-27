<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(Request $request)
    {
        return view('user', [
            'user' => $request->user(),
            'recipes' => $request->user()->recipes,
        ]);
    }
}
