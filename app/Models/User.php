<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password', 'portrait'];

    use HasFactory;

    public static function getUserByEmail($email)
    {
        return self::where('email', $email)->first();
    }

    public static function getUserNameById($id)
    {
        return self::where('id', $id)->first()->name;
    }

    public static function createUser($request)
    {
        return self::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
    }

    public static function searchUser($text)
    {
        return self::select('id', 'name')->whereRaw("name LIKE '%$text%'")->get();
    }
}
