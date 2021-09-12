<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table = 'messages';
    protected $fillable = ['text', 'thread_id', 'user_id'];

    public static function getMessageList($threadId)
    {
        return self::where('thread_id', "=", $threadId)->get();
    }

    public static function createMessage($text, $threadId, $currentUser)
    {
        return self::create([
            'text' => $text,
            'thread_id' =>  $threadId,
            'user_id' =>  $currentUser,
        ]);
    }
}
