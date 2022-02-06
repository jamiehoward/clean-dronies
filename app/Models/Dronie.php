<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dronie extends Model
{
    use HasFactory;

    public $guarded = [];

    // include clean score in json
    protected $appends = ['clean_score'];

    public function winningVotes()
    {
        return $this->hasMany(Vote::class, 'winner_id');
    }

    public function losingVotes()
    {
        return $this->hasMany(Vote::class, 'loser_id');
    }

    public function getCleanScoreAttribute()
    {
        return number_format($this->winningVotes->count() - $this->losingVotes->count(),2);
    }
}
