<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password', 'avatar'];

    use HasFactory;

    public static function getUserById($id)
    {
        return self::where('id', $id)->first();
    }

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
            'password' => Hash::make($request->password),
            'avatar' => '/content/default-avatar.jpg',
        ]);
    }

    public static function searchUser($text)
    {
        return self::select('id', 'name', 'avatar')->whereRaw("name LIKE '%$text%'")->get();
    }

    public static function getAllUsers()
    {
        return self::select('id', 'name', 'avatar')->get();
    }

    public static function editName($user_id, $name)
    {
        return self::where('id', $user_id)
            ->update(['name' => $name]);
    }

    public static function editEmail($user_id, $email)
    {
        return self::where('id', $user_id)
            ->update(['email' => $email]);
    }

    public static function editPassword($user_id, $password)
    {
        return self::where('id', $user_id)
            ->update(['password' => $password]);
    }

    public static function editAvatar($user_id, $image)
    {
        return self::where('id', $user_id)
            ->update(['avatar' => $image]);
    }
}
