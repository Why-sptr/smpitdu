<?php

namespace App\Http\Controllers;

use App\Models\ProfileSekolah;
use Illuminate\Http\Request;

class ProfileSekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $db_smpitdu = ProfileSekolah::where('nama', 'LIKE', '%' . $request->search . '%')->paginate(5);
        } else {
            $db_smpitdu = ProfileSekolah::paginate(5);
        }
        return view('admin/h-profilesekolah', ['db_smpitdu' => $db_smpitdu]);
    }

    public function index2(){
        $db_smpitdu = ProfileSekolah::all();
       
        return response()->json([
            'status' => "success",
            "data" =>$db_smpitdu,
        ]);
    }

 

    public function tambahFoto()
    {
        return view('admin/tambahdataprofilesekolah');
    }

    public function insertFoto(Request $request)
    {
        $request->validate([
            'foto' => 'required',
            'foto.*' => 'mimes:doc,docx,PDF,pdf,jpg,jpeg,png|max:2000'
        ]);
        if ($request->hasfile('foto')) {
            $files = [];
            foreach ($request->file('foto') as $file) {
                if ($file->isValid()) {
                    $foto = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $file->getClientOriginalName());
                    $file->move(public_path('fotosekolah'), $foto);
                    $files[] = [
                        'foto' => $foto,
                    ];
                }
            }
            ProfileSekolah::insert($files);
        }
        return redirect()->route('admin/h-profilesekolah')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function tampil($id)
    {

        $db_smpitdu = ProfileSekolah::find($id);
        return view('admin/tampilkanfoto', compact('db_smpitdu'));
    }

    public function updatedataprofile(Request $request, $id)
    {
        $db_smpitdu = ProfileSekolah::find($id);
        $db_smpitdu->update($request->all());
       
        if ($request->hasfile('foto')) {
            $files = [];
            foreach ($request->file('foto') as $file) {
                if ($file->isValid()) {
                    $foto = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $file->getClientOriginalName());
                    $file->move(public_path('fotosekolah'), $foto);
                    $files[] = [
                        'foto' => $foto,
                    ];
                }
            }
            ProfileSekolah::insert($files);
        }
        return redirect()->route('admin/h-profilesekolah')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function delete($id)
    {
        $db_smpitdu = ProfileSekolah::find($id);
        $db_smpitdu->delete();
        return redirect()->route('admin/h-profilesekolah')->with('success', 'Data Berhasil Di Hapus');
    }

    public function trash()
    {
        // mengampil data guru yang sudah dihapus
        $db_smpitdu = ProfileSekolah::onlyTrashed()->get();
        return view('admin/trashprofile', ['db_smpitdu' => $db_smpitdu]);
    }

    public function restore($id)
    {
        $db_smpitdu = ProfileSekolah::onlyTrashed()->where('id', $id);
        $db_smpitdu->restore();
        return redirect()->route('admin/h-profilesekolah')->with('success', 'Data Berhasil Di Restore');
    }

    public function restoreall()
    {

        $db_smpitdu = ProfileSekolah::onlyTrashed();
        $db_smpitdu->restore();

        return redirect()->route('admin/h-profilesekolah')->with('success', 'Data Berhasil Di Restore');
    }

    public function hapuspermanen($id)
    {
        // hapus permanen data guru
        $db_smpitdu = ProfileSekolah::onlyTrashed()->where('id', $id);
        $db_smpitdu->forceDelete();

        return redirect()->route('admin/trashprofile')->with('success', 'Data Berhasil Di Hapus Permanen');
    }

    public function hapuspermanenall()
    {
        // hapus permanen semua data guru yang sudah dihapus
        $db_smpitdu = ProfileSekolah::onlyTrashed();
        $db_smpitdu->forceDelete();

        return redirect()->route('admin/trashprofile')->with('success', 'Data Berhasil Di Hapus Permanen Semua');
    }
}
