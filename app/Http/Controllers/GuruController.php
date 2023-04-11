<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $db_smpitdu = Guru::where('nama','LIKE','%' .$request->search.'%')->paginate(5);

        }else{
            $db_smpitdu = Guru::paginate(5);
           
        } return view('admin/c-guru', ['db_smpitdu' => $db_smpitdu]);
       
    }

    public function index2(){
        $db_smpitdu = Guru::all();
        return response()->json([
            'status' => "success",
            "data" =>$db_smpitdu,
        ]);
    }

   

    public function tambahguru()
    {
        return view('admin/tambahdataguru');
    }

    public function insertGuru(Request $request)
    {
        $this->validate($request,[
            'foto' => 'required',
            'nama' => 'required',
            'pengampu' => 'required',
        ]);
        $db_smpitdu =  Guru::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotoguru/', $request->file('foto')->getClientOriginalName());
            $db_smpitdu->foto = $request->file('foto')->getClientOriginalName();
            $db_smpitdu->save();
        }
        return redirect()->route('admin/c-guru')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function tampil($id)
    {

        $db_smpitdu = Guru::find($id);
        return view('admin/tampilkanguru', compact('db_smpitdu'));
    }

    public function updatedataguru(Request $request, $id)
    {
        $this->validate($request,[
            
            'nama' => 'required',
            'pengampu' => 'required',
        ]);
        $db_smpitdu = Guru::find($id);
        $db_smpitdu->update($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotoguru/', $request->file('foto')->getClientOriginalName());
            $db_smpitdu->foto = $request->file('foto')->getClientOriginalName();
            $db_smpitdu->save();
        }
        return redirect()->route('admin/c-guru')->with('success', 'Data Berhasil Di Update');
    }

    public function delete($id)
    {
        $db_smpitdu = Guru::find($id);
        $db_smpitdu->delete();
        return redirect()->route('admin/c-guru')->with('success', 'Data Berhasil Di Hapus');
    }

    public function trash(Request $request)
    {
        // mengampil data guru yang sudah dihapus
        if($request->has('search')){
            $db_smpitdu = Guru::where('nama','LIKE','%' .$request->search.'%')->paginate(5);

        }else{
            $db_smpitdu = Guru::onlyTrashed()->paginate(5);
           
        } return view('admin/trashguru', ['db_smpitdu' => $db_smpitdu]);
    }

    public function restoreguru($id)
    {
        $db_smpitdu = Guru::onlyTrashed()->where('id', $id);
        $db_smpitdu->restore();
        return redirect()->route('admin/c-guru')->with('success', 'Data Berhasil Di Restore');
    }

    public function restoreguruall()
    {

        $db_smpitdu = Guru::onlyTrashed();
        $db_smpitdu->restore();

        return redirect()->route('admin/c-guru')->with('success', 'Data Berhasil Di Restore');
    }

    public function hapuspermanenguru($id)
    {
        // hapus permanen data guru
        $db_smpitdu = Guru::onlyTrashed()->where('id', $id);
        $db_smpitdu->forceDelete();

        return redirect()->route('admin/trashguru')->with('success', 'Data Berhasil Di Hapus Permanen');
    }

    public function hapuspermanenguruall()
    {
        // hapus permanen semua data guru yang sudah dihapus
        $db_smpitdu = Guru::onlyTrashed();
        $db_smpitdu->forceDelete();

        return redirect()->route('admin/trashguru')->with('success', 'Data Berhasil Di Hapus Permanen Semua');
    }


    
}

