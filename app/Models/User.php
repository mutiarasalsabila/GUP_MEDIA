<?php

namespace App\Models;

use App\Models\Webinar;
use App\Models\Internship;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = "users";
    protected $primaryKey = "id";
    protected $fillable = [
        'name',
        'email',
        'phone',
        'level',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pendaftaranInternship()
    {
        return $this->belongsTo(Internship::class, 'user_id', 'id');
    }

    public function pendaftaranWebinar()
    {
        return $this->belongsTo(PendaftaranWebinar::class, 'user_id', 'id');
    }
}
