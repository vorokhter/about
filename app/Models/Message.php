<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table = 'messages';
    protected $fillable = ['text', 'thread_id', 'user_id'];

    public static function getMessageList($thread_id)
    {
        return self::where('thread_id', "=", $thread_id)->get();
    }

    public static function getLastMessage($thread_id)
    {
        return self::where('thread_id', "=", $thread_id)->get()->last();
    }

    public static function createMessage($text, $thread_id, $user_id)
    {
        return self::create([
            'text' => $text,
            'thread_id' =>  $thread_id,
            'user_id' =>  $user_id,
        ]);
    }
}
