<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Course;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;


class User extends Authenticatable
{
    

    



    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'style',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

     protected $casts = [
    'enrolled_courses' => 'array'
    ];
    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function enrolledCourses()
    {
        return $this->courses(); 
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isStudent(): bool
    {
        return $this->role === 'student';
    }
   

}
