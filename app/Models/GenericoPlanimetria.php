<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class GenericoPlanimetria extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'generico_planimetrias';

    public function createdByUserPlanimetria()
    {
        return $this->belongsTo(User::class, 'created_by');
    }  
}
