<?php

namespace App\Models;

use App\Models\Traits\RelatesToTeams;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;
    use SoftDeletes;
    use RelatesToTeams;

    protected $fillable = [
        'user_id',
        'team_id',
        'title',
        'description',
        'due_date',
        'assigned_to',
        'is_completed',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
