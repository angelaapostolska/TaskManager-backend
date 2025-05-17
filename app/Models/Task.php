<?php

namespace App\Models;

use App\Enums\TaskCategory;
use App\Enums\TaskState;
use App\Observers\TaskObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

//error javue so ova
//#[ObservedBy(TaskObserver::class)]
class Task extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description','category', 'state', 'end_date'];
    protected $casts = [
        'category' => TaskCategory::class,
        'state' => TaskState::class,
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
