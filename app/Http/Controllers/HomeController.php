<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if (!parent::authorize($request)) return redirect()->route('auth');

        return view('pages.index', [
            'current_user' => ['id' => $request->session()->get("user")->id, 'name' => $request->session()->get("user")->name, 'avatar' => $request->session()->get("user")->avatar],
        ]);
    }
}
