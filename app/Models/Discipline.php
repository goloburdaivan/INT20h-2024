<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Discipline extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'info',
        'type',
        'teacher_id'
    ];

    public $timestamps = false;

    public function students() : BelongsToMany {
        return $this->belongsToMany(Student::class, 'student_discipline');
    }

    public function marks() : HasMany {
        return $this->hasMany(Mark::class);
    }

    public function teacher() : BelongsTo {
        return $this->belongsTo(Teacher::class);
    }
}
