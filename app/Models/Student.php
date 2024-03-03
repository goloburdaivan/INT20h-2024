<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'last_name',
        'attestat',
        'pass_num',
        'status',
        'group_id'
    ];
    public $timestamps = false;

    public function group() : BelongsTo {
        return $this->belongsTo(Group::class);
    }
    public function disciplines() : BelongsToMany {
        return $this->belongsToMany(Discipline::class, 'student_discipline');
    }
}
