<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Confrontation extends Model
{
    use HasFactory;

    protected $table = 'games';
    public $timestamps = false;

    protected $fillable = [
        'IdHome',
        'GolsHome',
        'IdVisitor',
        'GolsVisitor',
    ];
}