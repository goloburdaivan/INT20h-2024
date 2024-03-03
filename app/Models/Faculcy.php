<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Faculcy extends Model
{
    use HasFactory;

    protected $table = 'faculties';

    protected $fillable = [
        'title'
    ];

    public $timestamps = false;

    function groups() : BelongsToMany {
        return $this->belongsToMany(Group::class);
    }
}
