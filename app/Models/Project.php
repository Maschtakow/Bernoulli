<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'result';
    public $timestamps = false;

    protected $fillable = [
        'IdTeam',
        'Team',
        'PTS',
        'J',
        'V',
        'E',
        'D',
        'GP',
        'GC',
        'SG',
    ];
}