<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'confirmed_by_b',
        'confirmed_by_c',
        'final_status'
    ];

    public function criteria()
    {
        return $this->hasMany(ProfileCriteria::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
