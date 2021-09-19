<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password', 'avatar'];

    use HasFactory;

    public static function getUserByEmail($email)
    {
        return self::where('email', $email)->first();
    }

    public static function getUserNameById($id)
    {
        return self::where('id', $id)->first()->name;
    }

    public static function getUserAvatarById($id)
    {
        return self::where('id', $id)->first()->avatar;
    }

    public static function getUserByCreatorId($creator_id)
    {
        return self::select('id', 'name', 'avatar')->where('id', $creator_id)->first();
    }

    public static function createUser($request)
    {
        return self::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'avatar' => '/content/default-avatar.jpg',
        ]);
    }

    public static function searchUser($text)
    {
        return self::select('id', 'name', 'avatar')->whereRaw("name LIKE '%$text%'")->get();
    }

    public static function editAvatar($user_id, $image)
    {
        return self::where('id', $user_id)
            ->update(['avatar' => $image]);
    }
}
