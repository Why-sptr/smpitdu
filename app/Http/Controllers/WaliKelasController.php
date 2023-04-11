<?php

namespace App\Http\Controllers;

use App\Models\WaliKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WaliKelasController extends Controller
{
    public function wali(Request $request)
    {
        if($request->has('search')){
            $db_smpitdu = WaliKelas::where('nama','LIKE','%' .$request->search.'%')->paginate(5);

        }else{
            $db_smpitdu = WaliKelas::paginate(5);
           
        } return view('admin/c-walikelas', ['db_smpitdu' => $db_smpitdu]);
       
    }

    public function index2(){
        $db_smpitdu = WaliKelas::all();
        return response()->json([
            'status' => "success",
            "data" => $db_smpitdu,
        ]);
    }

    


    public function tambahwali()
    {
        return view('admin/tambahdatawalikelas');
    }

    public function insertwali(Request $request)
    {
        $this->validate($request,[
            'foto' => 'required',
            'nama' => 'required',
            'kelas' => 'required|in:7A,7B,8A,8B,9A,9B'
        ],[
            'kelas' => 'Kelas tidak boleh kosong'
        ]);
        $db_smpitdu = WaliKelas::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotowalikelas/', $request->file('foto')->getClientOriginalName());
            $db_smpitdu->foto = $request->file('foto')->getClientOriginalName();
            $db_smpitdu->save();
        }
        return redirect()->route('admin/c-walikelas')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function tampil($id)
    {

        $db_smpitdu = WaliKelas::find($id);
        return view('admin/tampilkanwalikelas', compact('db_smpitdu'));
    }

    public function updatedatawali(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required',
            'kelas' => 'required|in:7A,7B,8A,8B,9A,9B'
        ],[
            'kelas' => 'Kelas tidak boleh kosong'
        ]);
        $db_smpitdu = WaliKelas::find($id);
        $db_smpitdu->update($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotowalikelas/', $request->file('foto')->getClientOriginalName());
            $db_smpitdu->foto = $request->file('foto')->getClientOriginalName();
            $db_smpitdu->save();
        }
        return redirect()->route('admin/c-walikelas')->with('success', 'Data Berhasil Di Update');
    }

    public function delete($id)
    {
        $db_smpitdu = WaliKelas::find($id);
        $db_smpitdu->delete();
        return redirect()->route('admin/c-walikelas')->with('success', 'Data Berhasil Di Hapus');
    }

    public function trash()
    {
        // mengampil data guru yang sudah dihapus
        $db_smpitdu = WaliKelas::onlyTrashed()->get();
        return view('admin/trashwali', ['db_smpitdu' => $db_smpitdu]);
    }

    public function restore($id)
    {
        $db_smpitdu = WaliKelas::onlyTrashed()->where('id', $id);
        $db_smpitdu->restore();
        return redirect()->route('admin/c-walikelas')->with('success', 'Data Berhasil Di Restore');
    }

    public function restoreall()
    {

        $db_smpitdu = WaliKelas::onlyTrashed();
        $db_smpitdu->restore();

        return redirect()->route('admin/c-walikelas')->with('success', 'Data Berhasil Di Restore');
    }

    public function hapuspermanen($id)
    {
        // hapus permanen data guru
        $db_smpitdu = WaliKelas::onlyTrashed()->where('id', $id);
        $db_smpitdu->forceDelete();

        return redirect()->route('admin/trashwali')->with('success', 'Data Berhasil Di Hapus Permanen');
    }

    public function hapuspermanenall()
    {
        // hapus permanen semua data guru yang sudah dihapus
        $db_smpitdu = WaliKelas::onlyTrashed();
        $db_smpitdu->forceDelete();

        return redirect()->route('admin/trashwali')->with('success', 'Data Berhasil Di Hapus Permanen Semua');
    }
}
