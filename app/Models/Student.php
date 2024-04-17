<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $fillable = ['nis', 'nama', 'major_id', 'class_id', 'rayon_id'];

    public function rayon()
    {
        return $this->belongsTo(Rayon::class);
    }
    public function major()
    {
        return $this->belongsTo(Major::class);
    }
    public function class()
    {
        return $this->belongsTo(StudentClass::class, 'class_id', 'id');
    }
}
