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

        $threads = Thread::getThreads($request->session()->get("user")->id);

        return view('pages.index', [
            'currentUser' => ['id' => $request->session()->get("user")->id, 'name' => $request->session()->get("user")->name],
            'threads' => $threads,
        ]);
    }

    // public function getThreads(Request $request)
    // {
    //     if (!parent::authorize($request)) return redirect()->route('auth');

    //     $threads = User::orderBy('name')->get();

    //     return view('pages.index', [
    //         'currentUser' => ['id' => $request->session()->get("user")->id, 'name' => $request->session()->get("user")->name],
    //         'threads' => $threads,
    //     ]);
    // }
}
