<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class fiscalia extends Model
{
    use HasFactory;

    public function createdByUser()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}



