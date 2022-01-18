<?php

namespace App\Http\Controllers;

use App\Models\Webinar;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\PendaftaranWebinar;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PendaftaranWebinarController extends Controller
{
    public function index()
    {
        $webinar = PendaftaranWebinar::all();
        return view('admin.webinar.peserta', compact('webinar'));
    }

    public function create($id)
    {
        if (!Auth::check()) {
            Session::flash('error', 'Silakan login terlebih dahulu');
            return redirect()->back()->with('code', 'modalLogin');
        } elseif (Auth::user()->level == "admin") {
            return redirect()->route('admin.dashboard');
        }

        if ((PendaftaranWebinar::where('webinar_id', $id)->where('user_id', Auth::user()->id))->count() > 0) {
            return redirect()->back()->with('code', 'modalPostDaftar')->with('jenis', 'gagal');
        }

        $webinar = Webinar::findOrFail($id);
        return view('user.webinar.pendaftaran', compact('webinar'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make(
            $request->all(),
            [
                'user_id' => 'required',
                'webinar_id' => 'required',
                'id_line' => 'required',
                'alasan' => 'required',
                'bukti_follow' => 'required|mimes:jpg,bmp,png',
            ],
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $fileName = time() . '_' . $request->user_id . '_Bukti Follow.' . $request->bukti_follow->getClientOriginalExtension();
        $request->file('bukti_follow')->storeAs('public/webinar/bukti-follow', $fileName);

        $webinar = new PendaftaranWebinar();
        $webinar->user_id = $request->user_id;
        $webinar->webinar_id = $request->webinar_id;
        $webinar->id_line = $request->id_line;
        $webinar->alasan = $request->alasan;
        $webinar->bukti_follow = $fileName;

        $save = $webinar->save();

        if ($save) {
            $pendaftaran_webinar = PendaftaranWebinar::where('user_id', $request->user_id)->orderBy('created_at', 'desc')->first();

            $notif = new Notification();
            $notif->user_id = $request->user_id;
            $notif->pendaftaran_webinar_id = $pendaftaran_webinar->id;
            $notif->jenis = "webinar";
            $notif->header = "Selamat! Pendaftaran webinar " . $pendaftaran_webinar->webinar->name . " telah berhasil";
            $notif->body = "*Silahkan cek email untuk mengakases link zoom dan untuk mengakses ke grup peserta";

            $save = $notif->save();
            return redirect()->route('notifikasi')->with('code', 'modalPostDaftar')->with('jenis', 'webinar');
        }
        Session::flash('error', 'Pendaftaran webinar gagal');
        return redirect()->back()->withInput();
    }

    public function getBukti(Request $request)
    {
        if (Storage::disk('public')->exists("webinar/bukti-follow/$request->bukti_follow")) {
            $path = Storage::disk('public')->path("webinar/bukti-follow/$request->bukti_follow");
            $content = file_get_contents($path);
            return response($content)->withHeaders([
                'Content-Type' => mime_content_type($path)
            ]);
        }
        return redirect()->back();
    }

    public function destroy($id)
    {
        $data = PendaftaranWebinar::findOrFail($id);

        File::delete('storage/webinar/bukti-follow/' . $data->bukti_follow);
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
