<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('user.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);
        $user = User::find($id);
        $user->update($request->all());
        return redirect()->route('user.index')
            ->with('User updated successfully');
    }
}
