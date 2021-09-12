<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory;

    protected $table = 'threads';

    public static function getPersonal($userId1, $userId2)
    {
        $personals = self::join('participation', 'threads.id', '=', 'participation.thread_id')
            ->where('threads.personal', "=", "1")
            ->whereRaw("((threads.creator_id = $userId1 AND participation.user_id = $userId2) OR (threads.creator_id = $userId2 AND participation.user_id = $userId1))")
            ->get();

        return $personals;
    }
}
