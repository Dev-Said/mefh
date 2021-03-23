<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChapitreSuivi extends Model
{
    use HasFactory;

    protected $fillable = [
        'formation_id',
        'module_id',
        'chapitre_id',
        'user_id',
    ];


}
