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

        if ($user && $request->password == $user->password) {
            $request->session()->put('user', $user);
            return response()->json('success', 200, ['Content-Type' => 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
        }

        return response()->json("error", 400, ['Content-Type' => 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    }

    public function logout(Request $request)
    {
        if (parent::authorize($request)) {
            $request->session()->remove('user');
            return response()->json('success', 200, ['Content-Type' => 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
        }
    }

    public function registration(Request $request)
    {
        $request->session()->remove('user');

        $user = User::getUserByEmail($request->email);

        if ($user) return response()->json("error", 400, ['Content-Type' => 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
        if ($request->password !== $request->passwordConfirm) return response()->json("error", 400, ['Content-Type' => 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);

        $new_user = User::createUser($request);

        if ($new_user) return response()->json('success', 200, ['Content-Type' => 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    }
}
