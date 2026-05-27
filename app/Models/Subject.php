<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'sks'];

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function jadwal()
    {
        return $this->hasOne(Jadwal::class);
    }
}
