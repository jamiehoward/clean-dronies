<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopDronie extends Model
{
    use HasFactory;

    public $guarded = [];

    public function dronie()
    {
        return $this->belongsTo(Dronie::class);
    }
}
