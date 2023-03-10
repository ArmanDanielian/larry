<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBio extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'bio',
    ];

    protected $casts = [
        'bio' => 'array'
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
