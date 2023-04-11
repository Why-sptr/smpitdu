<?php

namespace App\Http\Controllers;

use App\Models\WakilKepala;
use Illuminate\Http\Request;

class WakilKepalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $db_smpitdu = WakilKepala::where('nama','LIKE','%' .$request->search.'%')->paginate(5);

        }else{
            $db_smpitdu = WakilKepala::paginate(5);
           
        } return view('admin/c-wakilkepala', ['db_smpitdu' => $db_smpitdu]);
       
    }

    public function index2(){
        $db_smpitdu = WakilKepala::all();
        return response()->json([
            'status' => "success",
            "data" => $db_smpitdu,
        ]);
    }

   

    public function tambahwakil()
    {
        return view('admin/tambahdatawakilkepala');
    }

    public function insertwakil(Request $request)
    {
        $this->validate($request,[
            'foto' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
        ]);
        $db_smpitdu =  WakilKepala::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotowakil/', $request->file('foto')->getClientOriginalName());
            $db_smpitdu->foto = $request->file('foto')->getClientOriginalName();
            $db_smpitdu->save();
        }
        return redirect()->route('admin/c-wakilkepala')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function tampil($id)
    {

        $db_smpitdu = WakilKepala::find($id);
        return view('admin/tampilkanwakil', compact('db_smpitdu'));
    }

    public function updatedatawakil(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required',
            'jabatan' => 'required',
        ]);
        $db_smpitdu = WakilKepala::find($id);
        $db_smpitdu->update($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotowakil/', $request->file('foto')->getClientOriginalName());
            $db_smpitdu->foto = $request->file('foto')->getClientOriginalName();
            $db_smpitdu->save();
        }
        return redirect()->route('admin/c-wakilkepala')->with('success', 'Data Berhasil Di Update');
    }

    public function delete($id)
    {
        $db_smpitdu = WakilKepala::find($id);
        $db_smpitdu->delete();
        return redirect()->route('admin/c-wakilkepala')->with('success', 'Data Berhasil Di Hapus');
    }

    public function trash()
    {
        // mengampil data guru yang sudah dihapus
        $db_smpitdu = WakilKepala::onlyTrashed()->get();
        return view('admin/trashwakil', ['db_smpitdu' => $db_smpitdu]);
    }

    public function restore($id)
    {
        $db_smpitdu = WakilKepala::onlyTrashed()->where('id', $id);
        $db_smpitdu->restore();
        return redirect()->route('admin/c-wakilkepala')->with('success', 'Data Berhasil Di Restore');
    }

    public function restoreall()
    {

        $db_smpitdu = WakilKepala::onlyTrashed();
        $db_smpitdu->restore();

        return redirect()->route('admin/c-wakilkepala')->with('success', 'Data Berhasil Di Restore');
    }

    public function hapuspermanen($id)
    {
        // hapus permanen data guru
        $db_smpitdu = WakilKepala::onlyTrashed()->where('id', $id);
        $db_smpitdu->forceDelete();

        return redirect()->route('admin/trashwakil')->with('success', 'Data Berhasil Di Hapus Permanen');
    }

    public function hapuspermanenall()
    {
        // hapus permanen semua data guru yang sudah dihapus
        $db_smpitdu = WakilKepala::onlyTrashed();
        $db_smpitdu->forceDelete();

        return redirect()->route('admin/trashwakil')->with('success', 'Data Berhasil Di Hapus Permanen Semua');
    }

   
}
