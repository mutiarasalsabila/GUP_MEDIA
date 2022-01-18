<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    use HasFactory;

    protected $table = "internships";
    protected $primaryKey = "id";
    protected $foreignKey = "internship_division_id";
    protected $fillable = [
        'name',
        'internship_division_id',
        'description',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function internshipDivision()
    {
        return $this->belongsTo(InternshipDivision::class);
    }

    public function pendaftaranInternship()
    {
        return $this->belongsTo(PendaftaranInternship::class, 'webinar_id', 'id');
    }
}
