<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use \App\Models\Message;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory;

    protected $table = 'threads';
    protected $fillable = ['title', 'creator_id', 'personal'];

    public static function getPersonal($userId1, $userId2)
    {
        $personals = self::join('participation', 'threads.id', '=', 'participation.thread_id')
            ->where('threads.personal', "=", "1")
            ->whereRaw("((threads.creator_id = $userId1 AND participation.user_id = $userId2) OR (threads.creator_id = $userId2 AND participation.user_id = $userId1))")
            ->first();

        return $personals;
    }

    public static function getThreads($userId)
    {
        $threads = self::join('participation', 'threads.id', '=', 'participation.thread_id')
            ->whereRaw("threads.creator_id = $userId OR participation.user_id = $userId")
            ->get();

        return $threads;
    }

    public static function createThread($title, $creatorId, $personal)
    {
        $new_thread = self::create([
            'title' => $title,
            'creator_id' =>  $creatorId,
            'personal' =>  $personal,
        ]);
        return $new_thread;
    }
}
