<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mark extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'mark',
        'mark_date',
        'discipline_id',
        'student_id'
    ];

    public function student() : BelongsTo {
        return $this->belongsTo(Student::class);
    }

    public function discipline() : BelongsTo {
        return $this->belongsTo(Discipline::class);
    }
}
