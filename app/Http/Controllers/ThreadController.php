<?php

namespace App\Http\Controllers;

use \App\Models\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public function getPersonal(Request $request)
    {
        $thread = Thread::getPersonal(json_decode($request->getContent())->userId, $request->session()->get("user")->id);
        return $thread;
    }
}
