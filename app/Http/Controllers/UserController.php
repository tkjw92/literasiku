<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function insertUser(Request $request)
    {
        try {
            UserModel::insert([$request->except(['_token'])]);
            return back()->with('notification', 'Berhasil menambahkan user');
        } catch (\Illuminate\Database\UniqueConstraintViolationException) {
            return back()->withErrors('Username, email, dan phone tidak boleh sama dengan akun yang telah ada !!!');
        }
    }

    public function removeUser($id)
    {
        UserModel::find($id)->delete();
        return back()->with('notification', 'Berhasil menghapus user');
    }

    public function updateUser(Request $request)
    {
        UserModel::find($request->id)->update($request->except(['_token', '_method', 'id']));
        return back()->with('notification', 'Berhasil melakukan edit data user');
    }
}
