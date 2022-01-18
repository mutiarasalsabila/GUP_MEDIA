<?php

namespace App\Http\Controllers;

use App\Models\Webinar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class WebinarController extends Controller
{
    public function index()
    {
        $webinar = Webinar::all();
        return view('webinar', compact('webinar'));
    }

    public function adminIndex()
    {
        $webinar = Webinar::all();
        return view('admin.webinar.data', compact('webinar'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|unique:webinars',
                'speaker' => 'required',
                'icon' => 'required|mimes:jpeg,png,bmp,tiff',
                'timeline' => 'required|date|after:yesterday',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $fileName = $request->icon->getClientOriginalName();
        $request->file('icon')->storeAs('public/webinar-icon', $fileName);

        $div = new Webinar;
        $div->name = $request->name;
        $div->speaker = $request->speaker;
        $div->icon = $fileName;
        $div->timeline = $request->timeline;

        $save = $div->save();

        if ($save) {
            Session::flash('success', 'Berhasil add data');
            return redirect()->back();
        } else {
            Session::flash('errors', 'Gagal add data');
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|unique:webinars,name,' . $request->id,
                'speaker' => 'required',
                'icon' => 'required|mimes:jpeg,png,bmp,tiff',
                'timeline' => 'required|date|after:yesterday',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $webinar = Webinar::findOrFail($id);
        if (File::exists('storage/webinar-icon/' . $webinar->icon)) {
            File::delete('storage/webinar-icon/' . $webinar->icon);
        }

        $fileName = $request->icon->getClientOriginalName();
        $request->file('icon')->storeAs('public/webinar-icon', $fileName);

        $update = $webinar->update(
            [
                'name' => $request->name,
                'speaker' => $request->speaker,
                'timeline' => $request->timeline,
                'icon' => $fileName,
            ]
        );

        if ($update) {
            Session::flash('success', 'Berhasil update data');
            return redirect()->back();
        } else {
            Session::flash('errors', 'Gagal update data');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $data = Webinar::findOrFail($id);

        File::delete('storage/webinar-icon/' . $data->icon);
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
