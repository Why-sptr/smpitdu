<?php

namespace App\Http\Controllers;

use App\Models\Siswa7b;
use App\Models\Spp;
use App\Models\Tahun;
use Illuminate\Http\Request;

class Siswa7bController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $db_smpitdu = Siswa7b::where('nama','LIKE','%' .$request->search.'%')->paginate(5);

        }else{
            $db_smpitdu = Siswa7b::with('spps')->where('kelas','LIKE','7B')->paginate(5);
           
        } return view('admin/kelas/kelas7b', ['db_smpitdu' => $db_smpitdu]);
       
    }

    public function kelas7a(Request $request)
    {
        if($request->has('search')){
            $db_smpitdu = Siswa7b::where('nama','LIKE','%' .$request->search.'%')->paginate(5);

        }else{
            $db_smpitdu = Siswa7b::with('spps')->where('kelas','LIKE','7A')->paginate(5);
           
        } return view('admin/kelas/kelas7b', ['db_smpitdu' => $db_smpitdu]);
       
    }

    public function kelas8a(Request $request)
    {
        if($request->has('search')){
            $db_smpitdu = Siswa7b::where('nama','LIKE','%' .$request->search.'%')->paginate(5);

        }else{
            $db_smpitdu = Siswa7b::with('spps')->where('kelas','LIKE','8A')->paginate(5);
           
        } return view('admin/kelas/kelas7b', ['db_smpitdu' => $db_smpitdu]);
       
    }

    public function kelas8b(Request $request)
    {
        if($request->has('search')){
            $db_smpitdu = Siswa7b::where('nama','LIKE','%' .$request->search.'%')->paginate(5);

        }else{
            $db_smpitdu = Siswa7b::with('spps')->where('kelas','LIKE','8B')->paginate(5);
           
        } return view('admin/kelas/kelas7b', ['db_smpitdu' => $db_smpitdu]);
       
    }

    public function kelas9a(Request $request)
    {
        if($request->has('search')){
            $db_smpitdu = Siswa7b::where('nama','LIKE','%' .$request->search.'%')->paginate(5);

        }else{
            $db_smpitdu = Siswa7b::with('spps')->where('kelas','LIKE','9A')->paginate(5);
           
        } return view('admin/kelas/kelas7b', ['db_smpitdu' => $db_smpitdu]);
       
    }

    public function kelas9b(Request $request)
    {
        if($request->has('search')){
            $db_smpitdu = Siswa7b::where('nama','LIKE','%' .$request->search.'%')->paginate(5);

        }else{
            $db_smpitdu = Siswa7b::with('spps')->where('kelas','LIKE','9B')->paginate(5);
           
        } return view('admin/kelas/kelas7b', ['db_smpitdu' => $db_smpitdu]);
       
    }

    // Function Api

    public function index2(){
        $db_smpitdu = Siswa7b::with('spps')->where('kelas','LIKE','7B')->get();
        return response()->json([
            'status' => "success",
            "data" =>$db_smpitdu,
        ]);
    }

    public function siswa7a(){
        $db_smpitdu = Siswa7b::with('spps')->where('kelas','LIKE','7A')->get();
        return response()->json([
            'status' => "success",
            "data" =>$db_smpitdu,
        ]);
    }
    public function siswa8a(){
        $db_smpitdu = Siswa7b::with('spps')->where('kelas','LIKE','8A')->get();
        return response()->json([
            'status' => "success",
            "data" =>$db_smpitdu,
        ]);
    }
    public function siswa8b(){
        $db_smpitdu = Siswa7b::with('spps')->where('kelas','LIKE','8B')->get();
        return response()->json([
            'status' => "success",
            "data" =>$db_smpitdu,
        ]);
    }
    public function siswa9a(){
        $db_smpitdu = Siswa7b::with('spps')->where('kelas','LIKE','9A')->get();
        return response()->json([
            'status' => "success",
            "data" =>$db_smpitdu,
        ]);
    }
    public function siswa9b(){
        $db_smpitdu = Siswa7b::with('spps')->where('kelas','LIKE','9B')->get();
        return response()->json([
            'status' => "success",
            "data" =>$db_smpitdu,
        ]);
    }





    public function tambahsiswa7b()
    {
        return view('admin/kelas/tambahdatasiswa7b');
    }

    public function insertSiswa7b(Request $request)
    {
       
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotosiswa7b/', $request->file('foto')->getClientOriginalName());
            $db_smpitdu =  Siswa7b::create(['id'=>$request->id, 'nama'=>$request->nama,'password'=>$request->password, 'kelas'=>$request->kelas,
             'foto'=> $request->file('foto')->getClientOriginalName()]);
            
        }else{ $db_smpitdu =  Siswa7b::create(['id'=>$request->id, 'nama'=>$request->nama, 'password'=>$request->password, 'kelas'=>$request->kelas]);}
        $sppsekolah = Spp::create(['tahun_ajaran'=>$request->tahun_ajaran, 'tanggal_tagihan'=>$request->tanggal_tagihan,
        'tagihan'=>$request->tagihan, 'NIS_id'=>$db_smpitdu->id, 'NIS_type'=>"App\Models\Siswa7b"]);
        
        return redirect()->back()->with('success', 'Data Berhasil Di Tambahkan');
    }
    

    public function tampil($id)
    {

        $db_smpitdu = Siswa7b::find($id);
        return view('admin/kelas/tampilkansiswa7b', compact('db_smpitdu'));
    }

    public function updatedatasiswa7b(Request $request, $id)
    {
        $db_smpitdu = Siswa7b::find($id);
        $db_smpitdu->update($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotosiswa7b/', $request->file('foto')->getClientOriginalName());
            $db_smpitdu->foto = $request->file('foto')->getClientOriginalName();
            $db_smpitdu->save();
        }
        
        return redirect()->route('admin/kelas/kelas7b')->with('success', 'Data Berhasil Di Update');
    }

    public function delete($id)
    {
        $db_smpitdu = Siswa7b::find($id);
        $db_smpitdu->delete();
        return redirect()->route('admin/kelas/kelas7b')->with('success', 'Data Berhasil Di Hapus');
    }

    public function trash(Request $request)
    {
        // mengampil data guru yang sudah dihapus
        if($request->has('search')){
            $db_smpitdu = Siswa7b::where('nama','LIKE','%' .$request->search.'%')->paginate(5);

        }else{
            $db_smpitdu = Siswa7b::onlyTrashed()->paginate(5);
           
        } return view('admin/kelas/trashsiswa7b', ['db_smpitdu' => $db_smpitdu]);
    }


    public function restore($id)
    {
        $db_smpitdu = Siswa7b::onlyTrashed()->where('id', $id);
        $db_smpitdu->restore();
        return redirect()->route('admin/kelas/kelas7b')->with('success', 'Data Berhasil Di Restore');
    }

    public function restoreall()
    {

        $db_smpitdu = Siswa7b::onlyTrashed();
        $db_smpitdu->restore();

        return redirect()->route('admin/kelas/kelas7b')->with('success', 'Data Berhasil Di Restore');
    }

    public function hapuspermanen($id)
    {
        // hapus permanen data guru
        $db_smpitdu = Siswa7b::onlyTrashed()->where('id', $id);
        $db_smpitdu->forceDelete();

        return redirect()->route('admin/trashsiswa7b',)->with('success', 'Data Berhasil Di Hapus Permanen');
    }

    public function hapuspermanenall()
    {
        // hapus permanen semua data guru yang sudah dihapus
        $db_smpitdu = Siswa7b::onlyTrashed();
        $db_smpitdu->forceDelete();

        return redirect()->route('admin/trashsiswa7b')->with('success', 'Data Berhasil Di Hapus Permanen Semua');
    }


}
