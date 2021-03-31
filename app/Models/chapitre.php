<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chapitre extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'fichier_video',
        'description',
        'ordre',
        'module_id',
    ];



    public function module()
    {
        return $this->belongsTo(module::class);
    }
}
