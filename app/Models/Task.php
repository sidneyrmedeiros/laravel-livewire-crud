<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'tasks';

    protected $fillable = ['name', 'priority'];

    /**
     * Get the user that owns the Task
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the project that owns the Task
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
