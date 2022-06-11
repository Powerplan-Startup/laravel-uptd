<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Instruktur extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'instruktur';
    protected $primaryKey = 'nip';
    protected $guarded = [];
    protected $keyType = "string";
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
