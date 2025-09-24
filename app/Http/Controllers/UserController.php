<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('categories')->get();
        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        return view('user', [
           'user' => User::all()->where('id', $id)->first()
        ]);
    }
}
