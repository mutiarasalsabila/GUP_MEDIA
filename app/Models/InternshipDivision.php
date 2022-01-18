<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternshipDivision extends Model
{
    use HasFactory;

    protected $table = "internship_divisions";
    protected $primaryKey = "id";
    protected $fillable = [
        'name',
        'icon',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function internship()
    {
        return $this->hasMany(Internship::class);
    }
}
