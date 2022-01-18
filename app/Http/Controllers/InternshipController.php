<?php

namespace App\Http\Controllers;

use App\Models\Internship;
use Illuminate\Http\Request;
use App\Models\InternshipDivision;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class InternshipController extends Controller
{
    public function index()
    {
        $internship_division = InternshipDivision::all()->load('internship');
        return view('internship', compact('internship_division'));
    }

    public function indexDivision()
    {
        $internship_division = InternshipDivision::all()->load('internship');
        return view('admin.internship.division', compact('internship_division'));
    }

    public function indexSubdivision()
    {
        $internship = Internship::all();
        $internship_division = InternshipDivision::all();
        return view('admin.internship.subdivision', compact('internship', 'internship_division'));
    }

    public function updateDivision(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|unique:internship_divisions,name,' . $request->id,
                'icon' => 'required|mimes:jpeg,png,bmp,tiff',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $internship_division = InternshipDivision::findOrFail($id);
        if (File::exists('storage/internship-icon/' . $internship_division->icon)) {
            File::delete('storage/internship-icon/' . $internship_division->icon);
        }

        $fileName = $request->icon->getClientOriginalName();
        $request->file('icon')->storeAs('public/internship-icon', $fileName);

        $update = $internship_division->update(
            [
                'name' => $request->name,
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

    public function updateSubdivision(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|unique:internships,name,' . $request->id,
                'internship_division_id' => 'required',
                'description' => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $update = Internship::findOrFail($id)->update(
            [
                'name' => $request->name,
                'internship_division_id' => $request->internship_division_id,
                'description' => $request->description,
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

    public function storeDivision(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|unique:internship_divisions',
                'icon' => 'required|mimes:jpeg,png,bmp,tiff',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $fileName = $request->icon->getClientOriginalName();
        $request->file('icon')->storeAs('public/internship-icon', $fileName);

        $div = new InternshipDivision;
        $div->name = $request->name;
        $div->icon = $fileName;

        $save = $div->save();

        if ($save) {
            Session::flash('success', 'Berhasil add data');
            return redirect()->back();
        } else {
            Session::flash('errors', 'Gagal add data');
            return redirect()->back();
        }
    }

    public function storeSubdivision(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|unique:internships',
                'internship_division_id' => 'required',
                'description' => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $div = new Internship;
        $div->name = $request->name;
        $div->internship_division_id = $request->internship_division_id;
        $div->description = $request->description;

        $save = $div->save();

        if ($save) {
            Session::flash('success', 'Berhasil add data');
            return redirect()->back();
        } else {
            Session::flash('errors', 'Gagal add data');
            return redirect()->back();
        }
    }

    public function destroyDivision($id)
    {
        $data = InternshipDivision::findOrFail($id);

        File::delete('storage/internship-icon/' . $data->icon);
        $delete = $data->delete();

        if ($delete) {
            Session::flash('success', 'Berhasil hapus data');
            return redirect()->back();
        } else {
            Session::flash('errors', 'Gagal hapus data');
            return redirect()->back();
        }
    }

    public function destroySubdivision($id)
    {
        $data = Internship::findOrFail($id);
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
