<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webinar extends Model
{
    use HasFactory;

    protected $table = "webinars";
    protected $primaryKey = "id";
    protected $fillable = [
        'name',
        'speaker',
        'icon',
        'timeline',
    ];

    protected $dates = [
        'timeline',
        'created_at',
        'updated_at',
    ];

    public function pendaftaranWebinar()
    {
        return $this->belongsTo(PendaftaranWebinar::class, 'webinar_id', 'id');
    }
}
