<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use \App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if (!parent::authorize($request)) return redirect()->route('auth');

        return view('pages.index', [
            'currentUser' => ['id' => $request->session()->get("user")->id, 'name' => $request->session()->get("user")->name],
        ]);
    }
}
