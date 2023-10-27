<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Incident extends Model
{
    use HasFactory, SoftDeletes;
    public function status()
    {
        return $this->belongsTo(Status::class, 'status');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function departament()
    {
        return $this->belongsTo(Departament::class);
    }
}
