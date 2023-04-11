<?php

namespace App\Http\Controllers;

use App\Models\Juara;
use App\Models\Prestasi;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $db_smpitdu = Prestasi::where('lomba', 'LIKE', '%' . $request->search . '%')->paginate(5);
        } else {
            $db_smpitdu = Prestasi::with('juara')->paginate(5);
        }
        return view('admin/h-prestasi', ['db_smpitdu' => $db_smpitdu]);
    }

    public function index2()
    {
        $db_smpitdu = Prestasi::with('juara')->get();
        return response()->json([
            'status' => "success",
            "data" =>$db_smpitdu,
        ]);
    }




    public function tambahprestasi()
    {
        $db_smpitdu = Juara::all();
        return view('admin/tambahdataprestasi', compact('db_smpitdu'));
    }


    public function insertPrestasi(Request $request)
    {
        $this->validate($request, [
            'juara_id' => 'required',
            'lomba' => 'required',
            'tingkat' => 'required',
        ]);
        $db_smpitdu = Prestasi::create($request->all());
        if ($request->hasFile('medal')) {
            $request->file('foto')->move('fotojuara/', $request->file('medal')->getClientOriginalName());
            $db_smpitdu->medal = $request->file('medal')->getClientOriginalName();
            $db_smpitdu->save();
        }
        return redirect()->route('admin/h-prestasi')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function tampil($id)
    {
        $juara = Juara::all();
        $db_smpitdu = Prestasi::find($id);
        return view('admin/tampilkanprestasi', compact('db_smpitdu', 'juara'));
    }

    public function updatedataprestasi(Request $request, $id)
    {
        $this->validate($request, [
            'juara_id' => 'required',
            'lomba' => 'required',
            'tingkat' => 'required',
        ]);
        $db_smpitdu = Juara::all();
        $db_smpitdu = Prestasi::find($id);
        $db_smpitdu->update($request->all());
        if ($request->hasFile('medal')) {
            $request->file('medal')->move('fotojuara/', $request->file('medal')->getClientOriginalName());
            $db_smpitdu->medal = $request->file('medal')->getClientOriginalName();
            $db_smpitdu->save();
        }
        return redirect()->route('admin/h-prestasi')->with('success', 'Data Berhasil Di Update');
    }

    public function delete($id)
    {
        $db_smpitdu = Prestasi::find($id);
        $db_smpitdu->delete();
        return redirect()->route('admin/h-prestasi')->with('success', 'Data Berhasil Di Hapus');
    }

    public function trash()
    {
        // mengampil data guru yang sudah dihapus
        $db_smpitdu = Prestasi::onlyTrashed()->get();
        return view('admin/trashprestasi', ['db_smpitdu' => $db_smpitdu]);
    }

    public function restore($id)
    {
        $db_smpitdu = Prestasi::onlyTrashed()->where('id', $id);
        $db_smpitdu->restore();
        return redirect()->route('admin/h-prestasi')->with('success', 'Data Berhasil Di Restore');
    }

    public function restoreall()
    {

        $db_smpitdu = Prestasi::onlyTrashed();
        $db_smpitdu->restore();

        return redirect()->route('admin/h-prestasi')->with('success', 'Data Berhasil Di Restore');
    }

    public function hapuspermanen($id)
    {
        // hapus permanen data guru
        $db_smpitdu = Prestasi::onlyTrashed()->where('id', $id);
        $db_smpitdu->forceDelete();

        return redirect()->route('admin/trashprestasi')->with('success', 'Data Berhasil Di Hapus Permanen');
    }

    public function hapuspermanenall()
    {
        // hapus permanen semua data guru yang sudah dihapus
        $db_smpitdu = Prestasi::onlyTrashed();
        $db_smpitdu->forceDelete();

        return redirect()->route('admin/trashprestasi')->with('success', 'Data Berhasil Di Hapus Permanen Semua');
    }
}
