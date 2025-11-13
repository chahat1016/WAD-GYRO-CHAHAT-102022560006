<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'nim', 
        'email',
        'password',
        'class', 
        'study_program', 
        'faculty', 
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get a single student's data for the practicum.
     *
     * @return array
     */
    public static function getPracticumStudentData(): array
    {
        return [
            'name' => 'Chahat',
            'nim' => '102022560006',
            'class' => 'SI48INT',
            'study_program' => 'S1 Sistem Informasi',
            'faculty' => 'Fakultas Rekayasa Industri',
            'email' => 'chahat1016.becse24@chitkara.edu.in',
        ];
    }
}