<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Departament extends Model
{
    use HasFactory, SoftDeletes;
    
    public function users()
    {
        return $this->hasMany(User::class, 'departament_id', 'id');
    }

    public function incidents()
    {
        return $this->hasMany(Incident::class);
    }
}
