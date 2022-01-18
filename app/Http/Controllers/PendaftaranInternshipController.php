<?php

namespace App\Http\Controllers;

use App\Models\Internship;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\PendaftaranInternship;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PendaftaranInternshipController extends Controller
{
    public function index()
    {
        $internship = PendaftaranInternship::all();
        return view('admin.internship.peserta', compact('internship'));
    }

    public function create($id)
    {
        if (!Auth::check()) {
            Session::flash('error', 'Silakan login terlebih dahulu');
            return redirect()->back()->with('code', 'modalLogin');
        } elseif (Auth::user()->level == "admin") {
            return redirect()->route('admin.dashboard');
        }

        if ((PendaftaranInternship::where('internship_id', $id)->where('user_id', Auth::user()->id))->count() > 0) {
            return redirect()->back()->with('code', 'modalPostDaftar')->with('jenis', 'gagal');
        }

        $internship = Internship::findOrFail($id);
        return view('user.internship.pendaftaran', compact('internship'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'user_id' => 'required',
                'internship_id' => 'required',
                'linkedin' => 'required',
                'cv' => 'required|mimes:pdf',
                'portfolio' => 'required',
                'motivational_letter' => 'required|mimes:pdf',
            ],
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $filename_CV = time() . '_' . $request->user_id . '_CV.' . $request->cv->getClientOriginalExtension();
        $filename_ML = time() . '_' . $request->user_id . '_ML.' . $request->motivational_letter->getClientOriginalExtension();
        $request->file('cv')->storeAs('public/internship/cv', $filename_CV);
        $request->file('motivational_letter')->storeAs('public/internship/motivational-letter', $filename_ML);

        $internship = new PendaftaranInternship;
        $internship->user_id = $request->user_id;
        $internship->internship_id = $request->internship_id;
        $internship->linkedin = $request->linkedin;
        $internship->cv = $filename_CV;
        $internship->portfolio = $request->portfolio;
        $internship->motivational_letter = $filename_ML;

        $save = $internship->save();

        if ($save) {
            $pendaftaran_internship = PendaftaranInternship::where('user_id', $request->user_id)->orderBy('created_at', 'desc')->first();

            $notif = new Notification();
            $notif->user_id = $request->user_id;
            $notif->pendaftaran_internship_id = $pendaftaran_internship->id;
            $notif->jenis = "internship";
            $notif->header = "Selamat! Pendaftaran internship anda untuk posisi " . $pendaftaran_internship->internship->name . " telah berhasil";
            $notif->body = "*Silahkan cek email secara berkala untuk informasi berikutnya";

            $save = $notif->save();
            return redirect()->route('notifikasi')->with('code', 'modalPostDaftar')->with('jenis', 'internship');
        }
        Session::flash('error', 'Pendaftaran internship gagal');
        return redirect()->back()->withInput();
    }

    public function getML(Request $request)
    {
        // dd($request->motivational_letter);
        if (Storage::disk('public')->exists("internship/motivational-letter/$request->motivational_letter")) {
            $path = Storage::disk('public')->path("internship/motivational-letter/$request->motivational_letter");
            $content = file_get_contents($path);
            return response($content)->withHeaders([
                'Content-Type' => mime_content_type($path)
            ]);
        }
        return redirect()->back();
    }

    public function getCV(Request $request)
    {
        if (Storage::disk('public')->exists("internship/cv/$request->cv")) {
            $path = Storage::disk('public')->path("internship/cv/$request->cv");
            $content = file_get_contents($path);
            return response($content)->withHeaders([
                'Content-Type' => mime_content_type($path)
            ]);
        }
        return redirect()->back();
    }

    public function approve($id)
    {
        $pendaftaran_internship = PendaftaranInternship::findOrFail($id);
        $save = $pendaftaran_internship->update(['status' => 'Diterima']);

        if ($save) {
            $notif = new Notification();
            $notif->user_id = $pendaftaran_internship->user_id;
            $notif->pendaftaran_internship_id = $id;
            $notif->jenis = "internship";
            $notif->header = "Selamat! Anda telah diterima untuk mengikuti internship " . $pendaftaran_internship->internship->name;
            $notif->body = "*Silahkan tunggu informasi selanjutnya dan hadir pada sesi internship";

            $save = $notif->save();
            Session::flash('success', 'Berhasil update data');
            return redirect()->back();
        }
        Session::flash('errors', 'Gagal update data');
        return redirect()->back();
    }

    public function decline($id)
    {
        $pendaftaran_internship = PendaftaranInternship::findOrFail($id);
        $save = $pendaftaran_internship->update(['status' => 'Ditolak']);
        if ($save) {
            $notif = new Notification();
            $notif->user_id = $pendaftaran_internship->user_id;
            $notif->pendaftaran_internship_id = $id;
            $notif->jenis = "internship";
            $notif->header = "Mohon maaf, pendaftaran anda pada internship " . $pendaftaran_internship->internship->name . " ditolak";
            $notif->body = "*Terima kasih telah mendaftar pada program internship kami, semoga dapat bertemu pada program berikutnya";

            $save = $notif->save();
            Session::flash('success', 'Berhasil update data');
            return redirect()->back();
        }
        Session::flash('errors', 'Gagal update data');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $data = PendaftaranInternship::findOrFail($id);

        File::delete('storage/internship/cv/' . $data->cv);
        File::delete('storage/internship/motivational-letter/' . $data->motivational_letter);
        $delete = $data->delete();

        if ($delete) {
            Session::flash('success', 'Berhasil hapus data');
            return redirect()->back();
        } else {
            Session::flash('errors', 'Gagal hapus data');
            return redirect()->back();
        }
    }
}
