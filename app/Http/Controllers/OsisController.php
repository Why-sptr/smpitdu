<?php

namespace App\Http\Controllers;

use App\Models\Osis;
use Illuminate\Http\Request;

class OsisController extends Controller
{
    public function osis(Request $request)
    {
        if($request->has('search')){
            $db_smpitdu = Osis::where('nama','LIKE','%' .$request->search.'%')->paginate(5);

        }else{
            $db_smpitdu = Osis::paginate(5);
           
        } return view('admin/c-osis', ['db_smpitdu' => $db_smpitdu]);
       
    }

    public function index2(){
        $db_smpitdu = Osis::all();
        return response()->json([
            'status' => "success",
            "data" => $db_smpitdu,
        ]);
    }

    


    public function tambahosis()
    {
        return view('admin/tambahdataosis');
    }

    public function insertosis(Request $request)
    {
        $this->validate($request,[
            'foto' => 'required',
            'nama' => 'required',
            'jabatan' => 'required|in:Ketua Osis,Wakil Ketua,Sekertaris,Bendahara,Sie TIK'
        ],[
            'jabatan' => 'Jabatan tidak boleh kosong'
        ]);
        $db_smpitdu = Osis::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotoosis/', $request->file('foto')->getClientOriginalName());
            $db_smpitdu->foto = $request->file('foto')->getClientOriginalName();
            $db_smpitdu->save();
        }
        return redirect()->route('admin/c-osis')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function tampil($id)
    {

        $db_smpitdu = Osis::find($id);
        return view('admin/tampilkanosis', compact('db_smpitdu'));
    }

    public function updatedataosis(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required',
            'jabatan' => 'required|in:Ketua Osis,Wakil Ketua,Sekertaris,Bendahara,Sie TIK'
        ],[
            'jabatan' => 'Jabatan tidak boleh kosong'
        ]);
        $db_smpitdu = Osis::find($id);
        $db_smpitdu->update($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotoosis/', $request->file('foto')->getClientOriginalName());
            $db_smpitdu->foto = $request->file('foto')->getClientOriginalName();
            $db_smpitdu->save();
        }
        return redirect()->route('admin/c-osis')->with('success', 'Data Berhasil Di Update');
    }

    public function delete($id)
    {
        $db_smpitdu = Osis::find($id);
        $db_smpitdu->delete();
        return redirect()->route('admin/c-osis')->with('success', 'Data Berhasil Di Hapus');
    }

    public function trash()
    {
        // mengampil data guru yang sudah dihapus
        $db_smpitdu = Osis::onlyTrashed()->get();
        return view('admin/trashosis', ['db_smpitdu' => $db_smpitdu]);
    }

    public function restore($id)
    {
        $db_smpitdu = Osis::onlyTrashed()->where('id', $id);
        $db_smpitdu->restore();
        return redirect()->route('admin/c-osis')->with('success', 'Data Berhasil Di Restore');
    }

    public function restoreall()
    {

        $db_smpitdu = Osis::onlyTrashed();
        $db_smpitdu->restore();

        return redirect()->route('admin/c-osis')->with('success', 'Data Berhasil Di Restore');
    }

    public function hapuspermanen($id)
    {
        // hapus permanen data guru
        $db_smpitdu = Osis::onlyTrashed()->where('id', $id);
        $db_smpitdu->forceDelete();

        return redirect()->route('admin/trashosis')->with('success', 'Data Berhasil Di Hapus Permanen');
    }

    public function hapuspermanenall()
    {
        // hapus permanen semua data guru yang sudah dihapus
        $db_smpitdu = Osis::onlyTrashed();
        $db_smpitdu->forceDelete();

        return redirect()->route('admin/trashosis')->with('success', 'Data Berhasil Di Hapus Permanen Semua');
    }
}
