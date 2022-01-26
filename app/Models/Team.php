<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $table = 'teams';
    public $timestamps = false;

    protected $fillable = [
        'IdTeam',
        'Team',
    ];
}