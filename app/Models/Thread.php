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

    public static function getPersonal($user_id1, $user_id2)
    {
        return self::join('participation', 'threads.id', '=', 'participation.thread_id')
            ->where('threads.personal', "=", "1")
            ->whereRaw("((threads.creator_id = $user_id1 AND participation.user_id = $user_id2) OR (threads.creator_id = $user_id2 AND participation.user_id = $user_id1))")
            ->first();
    }

    public static function getThreadById($id)
    {
        return self::where('id', $id)->first();
    }

    public static function getThreadList($user_id)
    {
        return self::join('participation', 'threads.id', '=', 'participation.thread_id')
            ->whereRaw("threads.creator_id = $user_id OR participation.user_id = $user_id")
            ->get();
    }

    public static function createThread($title, $creator_id, $personal)
    {
        return self::create([
            'title' => $title,
            'creator_id' =>  $creator_id,
            'personal' =>  $personal,
        ]);
    }
}
