<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Specialty extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'code',
        'title'
    ];

    protected $table = 'specialties';

    public function groups(): BelongsToMany {
        return $this->belongsToMany(Group::class);
    }
}
