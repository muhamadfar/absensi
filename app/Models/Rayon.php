<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rayon extends Model
{
    use HasFactory;

    protected $table = 'rayon';
    protected $fillable = ['rayon'];

    public function students()
    {
        return $this->hasMany(Student::class, 'rayon_id', 'id');
    }
}
