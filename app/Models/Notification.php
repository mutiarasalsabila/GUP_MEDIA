<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table = "notifications";
    protected $primaryKey = "id";
    protected $foreignKey = "pendaftaran_webinar_id";
    protected $fillable = [
        'jenis',
        'pendaftaran_webinar_id',
        'info',
        'read_at',
    ];

    protected $dates = [
        'read_at',
        'created_at',
        'updated_at',
    ];

    public function pendaftaranWebinar()
    {
        return $this->hasOne(PendaftaranWebinar::class, 'id', 'pendaftaran_webinar_id');
    }

    public function pendaftaranInternship()
    {
        return $this->hasOne(PendaftaranInternship::class, 'id', 'pendaftaran_webinar_id');
    }
}
