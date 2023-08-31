<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory;
    use SoftDeletes;

    public const STATUS_TODO = 'Todo';
    public const STATUS_IN_PROGRESS = 'In Progress';
    public const STATUS_COMPLETED = 'Completed';
    public const STATUS_TRASHED = 'Trashed';

    public $fillable = [
        'user_id',
        'title',
        'description',
        'status',
    ];

    public static function getStatuses()
    {
        return collect([
            self::STATUS_TODO => self::STATUS_TODO,
            self::STATUS_IN_PROGRESS => self::STATUS_IN_PROGRESS,
            self::STATUS_COMPLETED => self::STATUS_COMPLETED,
        ]);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subTasks()
    {
        return $this->hasMany(SubTask::class);
    }
}
