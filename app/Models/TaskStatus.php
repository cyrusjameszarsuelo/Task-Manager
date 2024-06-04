<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TaskStatus extends Model
{
    use HasFactory;

    public function tasks(): HasMany {
        return $this->hasMany(Task::class)
            ->where('user_id', Auth::id())
            ->orderBy('title', 'ASC')
            ->orderBy('created_at', 'ASC');
    }
}
