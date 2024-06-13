<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class ProfileCriteria extends Model
{
    use HasFactory;

    protected $table = 'profile_criteria';
    protected $fillable = [
        'profile_id',
        'criterion',
        'score',
        'score2',
        'average',
        'school_year',
        'file_path',
        'status',
        'confirmed_by',
        'category'
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public static function getByCategory($category)
    {
        return self::where('category', $category)->get();
    }

    public function updateStatus($status)
    {
        $this->status = $status;
        $this->save();
    }

    public function confirmBy($userId)
    {
        $this->confirmed_by = $userId;
        $this->save();
    }

    public function confirmedByUser()
    {
        return $this->belongsTo(User::class, 'confirmed_by');
    }

    public function getFilePathAttribute($value)
    {
        if ($value) {
            return asset('storage/' . $value);
        }
        return null;
    }
}
