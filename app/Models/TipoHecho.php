<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoHecho extends Model
{
    use HasFactory;

    public function createdByUsrHecho()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
