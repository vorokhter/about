<?php

namespace App\Http\Controllers;

use \App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function auth(Request $request)
    {
        if (parent::authorize($request)) return redirect()->route('home');
        return view('pages.auth');
    }

    public function login(Request $request)
    {
        $request->session()->remove('user');

        $user = User::getUserByEmail($request->email);

        if (!$user) return parent::responseJSON('Пользователя не существует', 400);

        if ($request->password != $user->password) return parent::responseJSON('Неправильный пароль', 400);

        $request->session()->put('user', $user);
        return parent::responseJSON('success', 200);
    }

    public function logout(Request $request)
    {
        if (parent::authorize($request)) {
            $request->session()->remove('user');
            return parent::responseJSON('success', 200);
        }
    }

    public function registration(Request $request)
    {
        $request->session()->remove('user');

        $user = User::getUserByEmail($request->email);

        if ($user) return parent::responseJSON('Пользователь уже существует', 400);
        if ($request->password != $request->passwordConfirm) return parent::responseJSON('Пароли не совпадают', 400);

        $new_user = User::createUser($request);

        if ($new_user) return parent::responseJSON('success', 200);
    }
}
