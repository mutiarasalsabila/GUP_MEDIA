<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranWebinar extends Model
{
    use HasFactory;

    protected $table = "pendaftaran_webinars";
    protected $primaryKey = "id";
    protected $foreignKey = [
        'user_id',
        'webinar_id',
    ];
    protected $fillable = [
        'user_id',
        'webinar_id',
        'id_line',
        'alasan',
        'bukti_follow',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function webinar()
    {
        return $this->hasOne(Webinar::class, 'id', 'webinar_id');
    }

    public function notification()
    {
        return $this->belongsTo(Notification::class, 'pendaftaran_webinar_id', 'id');
    }
}
