<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
// use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable; 

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function usersCoolPosts() {
        // mengembalikan relasi Post (semua Post dari user_id) 
        return $this->hasMany(Post::class, 'user_id'); 
    }
}
