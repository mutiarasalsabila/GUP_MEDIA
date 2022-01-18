<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranInternship extends Model
{
    use HasFactory;

    protected $table = "pendaftaran_internships";
    protected $primaryKey = "id";
    protected $foreignKey = [
        'user_id', 'internship_id',
    ];

    protected $fillable = [
        'user_id',
        'internship_id',
        'linkedin',
        'cv',
        'portfolio',
        'motivational_letter',
        'status',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function internship()
    {
        return $this->hasOne(Internship::class, 'id', 'internship_id');
    }

    public function notification()
    {
        return $this->belongsTo(Notification::class, 'pendaftaran_internship_id', 'id');
    }
}
