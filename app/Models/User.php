<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['name', 'email', 'password', 'portrait'];
    protected $table = 'users';

    use HasFactory;

    public static function getUserByEmail($email)
    {
        return self::where('email', $email)->get()->first();
    }

    public static function createUser($request)
    {
        $new_user = self::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        return $new_user;
    }
}
