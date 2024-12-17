<?php

namespace App\Models;

use App\Enums\TodoStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    /** @use HasFactory<\Database\Factories\TodoFactory> */
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'status',
        'user_id',
    ];

    protected $casts = [
        'status' => TodoStatus::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
