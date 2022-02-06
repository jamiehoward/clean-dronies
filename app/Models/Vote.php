<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    public $guarded = [];

    public function winner()
    {
        return $this->belongsTo(Dronie::class, 'winner_id');
    }

    public function loser()
    {
        return $this->belongsTo(Dronie::class, 'loser_id');
    }
}
