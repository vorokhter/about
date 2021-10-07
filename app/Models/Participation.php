<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
    use HasFactory;

    protected $table = 'participation';
    protected $fillable = ['thread_id', 'user_id'];

    public static function inviteUser($thread_id, $user_id)
    {
        return self::create([
            'thread_id' => $thread_id,
            'user_id' =>  $user_id,
        ]);
    }

    public static function getUserByThread($thread_id)
    {
        return self::select('users.id', 'users.name', 'users.avatar')->join('users', 'participation.user_id', '=', 'users.id')
            ->where("participation.thread_id", $thread_id)->first();
    }

    public static function getUserByPersonalId($personal_id)
    {
        return self::select('users.id', 'users.name', 'users.avatar')->join('users', 'participation.user_id', '=', 'users.id')
            ->where("participation.thread_id", $personal_id)->first();
    }
}
