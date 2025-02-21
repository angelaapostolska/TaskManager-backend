<?php

namespace App\Models;

use App\Enums\TaskCategory;
use App\Enums\TaskState;
use App\Observers\TaskObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy(TaskObserver::class)]
class Task extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description','category', 'state'];
    protected $casts = [
        'category' => TaskCategory::class,
        'state' => TaskState::class,
    ];
}
