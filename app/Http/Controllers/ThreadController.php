<?php

namespace App\Http\Controllers;

use \App\Models\Thread;
use \App\Models\Message;
use \App\Models\Participation;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public function getPersonal(Request $request)
    {
        $thread = Thread::getPersonal(json_decode($request->getContent())->userId, $request->session()->get("user")->id);

        if ($thread) return $thread;

        $new_thread = Thread::createThread("тред", $request->session()->get("user")->id, 1);

        Participation::inviteUser($new_thread->id, json_decode($request->getContent())->userId);

        return $new_thread;
    }

    public function getMessageList(Request $request)
    {
        $messages = Message::getMessageList(json_decode($request->getContent())->threadId);

        return view('includes.message-list', [
            'messages' =>  $messages,
            'currentUserId' => $request->session()->get("user")->id,
        ]);
    }

    public function sendMessage(Request $request)
    {
        $new_message = Message::createMessage(json_decode($request->getContent())->text, json_decode($request->getContent())->threadId, $request->session()->get("user")->id);

        if ($new_message) return response()->json('success', 200, ['Content-Type' => 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
        return response()->json("error", 400, ['Content-Type' => 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE);
    }
}
