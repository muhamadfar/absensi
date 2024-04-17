<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    use HasFactory;

    protected $table = 'presences';
    protected $fillable = ['student_id', 'jam_masuk', 'jam_keluar', 'date', 'ket'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
