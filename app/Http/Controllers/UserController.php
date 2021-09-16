<?php

namespace App\Http\Controllers;

use \App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function users(Request $request)
    {
        if (!parent::authorize($request)) return redirect()->route('auth');

        return view('pages.users', [
            'current_user' => ['id' => $request->session()->get("user")->id, 'name' => $request->session()->get("user")->name],
        ]);
    }

    public function searchUser(Request $request)
    {
        $text = json_decode($request->getContent())->text;

        if ($text != '' && $users = User::searchUser($text)) return view('includes.user-list', [
            'users' =>  $users,
        ]);
    }
}
