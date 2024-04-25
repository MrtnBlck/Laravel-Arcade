<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Contest extends Model
{
    use HasFactory;

    protected $fillable = [
        'win',
        'history',
        'user_id',
        'place_id',
    ];

    public function place() : BelongsTo
    {
        return $this->belongsTo(Place::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function characters() : BelongsToMany
    {
        return $this->belongsToMany(Character::class, 'contest_character');
    }
}
