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
            'current_user' => ['id' => $request->session()->get("user")->id, 'name' => $request->session()->get("user")->name, 'avatar' => $request->session()->get("user")->avatar],
        ]);
    }

    public function settings(Request $request)
    {
        if (!parent::authorize($request)) return redirect()->route('auth');

        return view('pages.settings', [
            'current_user' => ['id' => $request->session()->get("user")->id, 'name' => $request->session()->get("user")->name, 'avatar' => $request->session()->get("user")->avatar],
        ]);
    }

    public function searchUser(Request $request)
    {
        $text = json_decode($request->getContent())->text;

        if ($text != '' && $users = User::searchUser($text)) return view('includes.user-list', [
            'users' =>  $users,
        ]);
    }

    public function editUser(Request $request)
    {
        $user = User::getUserByEmail($request->email);

        if ($user) return parent::responseJSON('Пользователь уже существует', 400);

        if ($request->password != $request->passwordConfirm) return parent::responseJSON('Пароли не совпадают', 400);

        $edit_user = User::editUser($request);

        if ($edit_user) return parent::responseJSON('success', 200);
    }

    public function editAvatar(Request $request)
    {
        $new_avatar = User::editAvatar($request->session()->get("user")->id, json_decode($request->getContent())->avatar);

        if (!$new_avatar) return parent::responseJSON('Смена аватара не удалась', 400);

        $user = User::getUserByEmail($request->session()->get("user")->email);

        $request->session()->put('user', $user);

        return parent::responseJSON('success', 200);
    }
}
