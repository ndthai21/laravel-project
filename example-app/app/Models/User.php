<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasPermissions, HasRoles;

    protected $fillable = [
        'name',
        'studentId',
        'birth',
        'gender',
        'class',
        'course',
        'major',
        'phone',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'birth' => 'date',
    ];

    // public function profiles()
    // {
    //     return $this->hasMany(Profile::class);
    // }

    // public function roles()
    // {
    //     return $this->belongsToMany(Role::class, 'role_user');
    // }

    // public function hasRole($role)
    // {
    //     return $this->roles()->where('name', $role)->exists();
    // }
}
