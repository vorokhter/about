<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
    use HasFactory;

    protected $table = 'participation';
    protected $fillable = ['thread_id', 'user_id'];

    public static function inviteUser($threadId, $userId)
    {
        $invite_user = self::create([
            'thread_id' => $threadId,
            'user_id' =>  $userId,
        ]);
        return $invite_user;
    }

    public static function getUserName($threadId)
    {
        $user_name = self::join('users', 'participation.user_id', '=', 'users.id')
            ->where("participation.thread_id", $threadId)->first()->name;

        return $user_name;
    }
}
