<?php

namespace App\Http\Controllers;

use \App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function searchUser(Request $request)
    {
        $text = json_decode($request->getContent())->text;

        if ($text != '' && $users = User::searchUser($text)) return view('includes.user-list', [
            'users' =>  $users,
        ]);
    }
}
