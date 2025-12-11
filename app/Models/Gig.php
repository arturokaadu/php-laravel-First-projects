<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gig extends Model
{
    use HasFactory;

    protected $fillable = [
        'artist',
        'venue',
        'gig_date',
        'football_match_result',
        'football_team_status',
        'cultural_note',
    ];
}
