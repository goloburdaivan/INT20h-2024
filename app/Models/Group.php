<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'course',
        'study_form',
        'specialty_id',
        'faculty_id'
    ];

    public $timestamps = false;

    public function faculcy() : BelongsTo {
        return $this->belongsTo(Faculcy::class);
    }

    public function specialty() : BelongsTo {
        return $this->belongsTo(Specialty::class);
    }
}
