<?php

namespace App\Http\Controllers;

use App\Models\Kepala;
use Illuminate\Http\Request;

class KepalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $db_smpitdu = Kepala::where('nama','LIKE','%' .$request->search.'%')->paginate(5);

        }else{
            $db_smpitdu = Kepala::paginate(5);
           
        } return view('admin/c-kepalasekolah', ['db_smpitdu' => $db_smpitdu]);
       
    }

    public function index2(){
        $db_smpitdu = Kepala::all();
        return response()->json([
            'status' => "success",
            "data" =>$db_smpitdu,
        ]);
    }




    public function tambahkepala()
    {
        return view('admin/tambahdatakepalasekolah');
    }

    public function insertKepala(Request $request)
    {
        $this->validate($request,[
            'foto' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
        ]);
        $db_smpitdu =  Kepala::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotokepala/', $request->file('foto')->getClientOriginalName());
            $db_smpitdu->foto = $request->file('foto')->getClientOriginalName();
            $db_smpitdu->save();
        }
        return redirect()->route('admin/c-kepalasekolah')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function tampil($id)
    {

        $db_smpitdu = Kepala::find($id);
        return view('admin/tampilkankepala', compact('db_smpitdu'));
    }

    public function updatedatakepala(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required',
            'jabatan' => 'required',
        ]);
        $db_smpitdu = Kepala::find($id);
        $db_smpitdu->update($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotokepala/', $request->file('foto')->getClientOriginalName());
            $db_smpitdu->foto = $request->file('foto')->getClientOriginalName();
            $db_smpitdu->save();
        }
        return redirect()->route('admin/c-kepalasekolah')->with('success', 'Data Berhasil Di Update');
    }

    public function delete($id)
    {
        $db_smpitdu = Kepala::find($id);
        $db_smpitdu->delete();
        return redirect()->route('admin/c-kepalasekolah')->with('success', 'Data Berhasil Di Hapus');
    }

    public function trash()
    {
        // mengampil data guru yang sudah dihapus
        $db_smpitdu = Kepala::onlyTrashed()->get();
        return view('admin/trashkepala', ['db_smpitdu' => $db_smpitdu]);
    }

    public function restore($id)
    {
        $db_smpitdu = Kepala::onlyTrashed()->where('id', $id);
        $db_smpitdu->restore();
        return redirect()->route('admin/c-kepalasekolah')->with('success', 'Data Berhasil Di Restore');
    }

    public function restoreall()
    {

        $db_smpitdu = Kepala::onlyTrashed();
        $db_smpitdu->restore();

        return redirect()->route('admin/c-kepalasekolah')->with('success', 'Data Berhasil Di Restore');
    }

    public function hapuspermanen($id)
    {
        // hapus permanen data guru
        $db_smpitdu = Kepala::onlyTrashed()->where('id', $id);
        $db_smpitdu->forceDelete();

        return redirect()->route('admin/trashkepala')->with('success', 'Data Berhasil Di Hapus Permanen');
    }

    public function hapuspermanenall()
    {
        // hapus permanen semua data guru yang sudah dihapus
        $db_smpitdu = Kepala::onlyTrashed();
        $db_smpitdu->forceDelete();

        return redirect()->route('admin/trashkepala')->with('success', 'Data Berhasil Di Hapus Permanen Semua');
    }


    
}
