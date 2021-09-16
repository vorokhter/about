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

    public static function getUserName($thread_id)
    {
        return self::join('users', 'participation.user_id', '=', 'users.id')
            ->where("participation.thread_id", $thread_id)->first()->name;
    }
}
