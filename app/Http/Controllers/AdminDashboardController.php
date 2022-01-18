<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PendaftaranInternship;
use App\Models\PendaftaranWebinar;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $peserta_webinar = PendaftaranWebinar::count();
        $peserta_internship = PendaftaranInternship::count();
        return view('admin.dashboard', compact('peserta_webinar', 'peserta_internship'));
    }
}
