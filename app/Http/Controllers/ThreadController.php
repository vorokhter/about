<?php

namespace App\Http\Controllers;

use \App\Events\ThreadEvent;
use \App\Models\User;
use \App\Models\Thread;
use \App\Models\Message;
use \App\Models\Participation;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public function getThreadList(Request $request)
    {
        $threads = Thread::getThreadList($request->session()->get("user")->id);

        return view('includes.thread-list', [
            'threads' => $threads,
            'current_user' => ['id' => $request->session()->get("user")->id, 'name' => $request->session()->get("user")->name],
        ]);
    }

    public function getPersonal(Request $request)
    {
        $thread = Thread::getPersonal(json_decode($request->getContent())->userId, $request->session()->get("user")->id);

        if ($thread) return $thread;

        $new_thread = Thread::createThread(" ", $request->session()->get("user")->id, 1);

        Participation::inviteUser($new_thread->id, json_decode($request->getContent())->userId);

        return $new_thread;
    }

    public function getMessageList(Request $request)
    {
        $messages = Message::getMessageList(json_decode($request->getContent())->threadId);

        return view('includes.message-list', [
            'messages' =>  $messages,
            'current_user_id' => $request->session()->get("user")->id,
        ]);
    }

    public static function getThreadBar($user, $thread)
    {
        // if ($thread->personal == 0) return $thread->title;

        $user = ($thread->creator_id == $user['id']) ? Participation::getUserByThread($thread->id) : User::getUserById($thread->creator_id);

        return view('includes.thread-bar', [
            'user' =>  $user,
        ]);
    }

    public function getUserBar(Request $request)
    {
        $thread = Thread::getThreadById(json_decode($request->getContent())->threadId);

        //if ($thread->personal == 0) return $thread->title;

        $current_user = $request->session()->get("user");

        $user = ($thread->creator_id == $current_user->id) ? Participation::getUserByPersonalId($thread->id) : User::getUserByCreatorId($thread->creator_id);

        return view('includes.user-bar', [
            'user' =>  $user,
        ]);
    }

    public function sendMessage(Request $request)
    {
        $new_message = Message::createMessage(json_decode($request->getContent())->text, json_decode($request->getContent())->threadId, $request->session()->get("user")->id);

        event(new ThreadEvent($new_message));

        if ($new_message) return parent::responseJSON('success', 200);
    }
}
