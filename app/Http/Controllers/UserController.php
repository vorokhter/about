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

    public function getAllUsers(Request $request)
    {

        if ($users = User::getAllUsers()) return view('includes.user-list', [
            'users' =>  $users,
        ]);
    }

    public function editUser(Request $request)
    {
        $user_id = $request->session()->get("user")->id;
        $name = json_decode($request->getContent())->name;
        $email = json_decode($request->getContent())->email;
        $password = json_decode($request->getContent())->password;
        $password_confirm = json_decode($request->getContent())->passwordConfirm;

        if (strlen($name) > 0) User::editName($user_id, $name);

        if (strlen($email) > 0) {
            if (!User::getUserByEmail($email)) User::editEmail($user_id, $email);
            else return parent::responseJSON('Почта занята', 400);
        }

        if (strlen($password) > 0) {
            if ($password === $password_confirm) User::editPassword($user_id, $password);
            else return parent::responseJSON('Пароли не совпадают', 400);
        }

        $user = User::getUserById($user_id);

        $request->session()->put('user', $user);

        return parent::responseJSON('success', 200);
    }

    public function editAvatar(Request $request)
    {
        $new_avatar = User::editAvatar($request->session()->get("user")->id, json_decode($request->getContent())->avatar);

        if (!$new_avatar) return parent::responseJSON('Смена аватара не удалась', 400);

        $user = User::getUserById($request->session()->get("user")->id);

        $request->session()->put('user', $user);

        return parent::responseJSON('success', 200);
    }
}
