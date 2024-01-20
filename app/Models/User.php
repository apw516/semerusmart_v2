<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    const UPDATED_AT = null;
    const CREATED_AT = null;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table='user';
    // protected $fillable = [
    //     'nama_user',
    //     'username',
    //     'password',
    //     'kode_unit'
    // ];
    protected $guarded = ['id'];
    protected $fillable = [
        'nama',
        'username',
        'password',
        'hak_akses',
        'unit',
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
