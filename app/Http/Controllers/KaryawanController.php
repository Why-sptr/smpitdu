<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $db_smpitdu = Karyawan::where('nama','LIKE','%' .$request->search.'%')->paginate(5);

        }else{
            $db_smpitdu = Karyawan::paginate(5);
           
        } return view('admin/c-karyawan', ['db_smpitdu' => $db_smpitdu]);
       
    }

    public function index2(){
        $db_smpitdu = Karyawan::all();
        return response()->json([
            'status' => "success",
            "data" =>$db_smpitdu,
        ]);
    }

    

    public function tambahKaryawan()
    {
        return view('admin/tambahdatakaryawan');
    }

    public function insertKaryawan(Request $request)
    {
        $this->validate($request,[
            'foto' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
        ]);
        $db_smpitdu =  Karyawan::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotokaryawan/', $request->file('foto')->getClientOriginalName());
            $db_smpitdu->foto = $request->file('foto')->getClientOriginalName();
            $db_smpitdu->save();
        }
        return redirect()->route('admin/c-karyawan')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function tampil($id)
    {

        $db_smpitdu = Karyawan::find($id);
        return view('admin/tampilkankaryawan', compact('db_smpitdu'));
    }

    public function updatedatakaryawan(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required',
            'jabatan' => 'required',
        ]);
        $db_smpitdu = Karyawan::find($id);
        $db_smpitdu->update($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotokaryawan/', $request->file('foto')->getClientOriginalName());
            $db_smpitdu->foto = $request->file('foto')->getClientOriginalName();
            $db_smpitdu->save();
        }
        return redirect()->route('admin/c-karyawan')->with('success', 'Data Berhasil Di Update');
    }

    public function delete($id)
    {
        $db_smpitdu = Karyawan::find($id);
        $db_smpitdu->delete();
        return redirect()->route('admin/c-karyawan')->with('success', 'Data Berhasil Di Hapus');
    }

    public function trash(Request $request)
    {
        // mengampil data karyawan yang sudah dihapus
        if($request->has('search')){
            $db_smpitdu = Karyawan::where('nama','LIKE','%' .$request->search.'%')->paginate(5);

        }else{
            $db_smpitdu = Karyawan::onlyTrashed()->paginate(5);
           
        } return view('admin/trashkaryawan', ['db_smpitdu' => $db_smpitdu]);
    }

    public function restorekaryawan($id)
    {
        $db_smpitdu = Karyawan::onlyTrashed()->where('id', $id);
        $db_smpitdu->restore();
        return redirect()->route('admin/c-karyawan')->with('success', 'Data Berhasil Di Restore');
    }

    public function restorekaryawanall()
    {

        $db_smpitdu = Karyawan::onlyTrashed();
        $db_smpitdu->restore();

        return redirect()->route('admin/c-karyawan')->with('success', 'Data Berhasil Di Restore');
    }

    public function hapuspermanenkaryawan($id)
    {
        // hapus permanen data karyawan
        $db_smpitdu = Karyawan::onlyTrashed()->where('id', $id);
        $db_smpitdu->forceDelete();

        return redirect()->route('admin/trashkaryawan')->with('success', 'Data Berhasil Di Hapus Permanen');
    }

    public function hapuspermanenkaryawanall()
    {
        // hapus permanen semua data karyawan yang sudah dihapus
        $db_smpitdu = Karyawan::onlyTrashed();
        $db_smpitdu->forceDelete();

        return redirect()->route('admin/trashkaryawan')->with('success', 'Data Berhasil Di Hapus Permanen Semua');
    }


}
