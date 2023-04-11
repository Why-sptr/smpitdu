<?php

namespace App\Http\Controllers;

use App\Models\Juara;
use Illuminate\Http\Request;

class JuaraController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')){
            $db_smpitdu = Juara::where('juara','LIKE','%' .$request->search.'%')->paginate(5);

        }else{
            $db_smpitdu = Juara::paginate(5);
           
        } return view('admin/h-prestasi', ['db_smpitdu' => $db_smpitdu]);
       
    }

    public function index2(){
        $db_smpitdu = Juara::with('prestasi')->get();
        return response()->json([
            'status' => "success",
            "data" =>$db_smpitdu,
        ]);
    }

   

    public function tambahjuara()
    {
        return view('admin/tambahdatajuara');
    }

    public function insertJuara(Request $request)
    {
        $this->validate($request,[
            'medal' => 'required',
            'juara' => 'required',
            
        ]);
        $db_smpitdu =  Juara::create($request->all());
        if($request->hasFile('medal')){
            $request->file('medal')->move('fotojuara/', $request->file('medal')->getClientOriginalName());
            $db_smpitdu->medal = $request->file('medal')->getClientOriginalName();
            $db_smpitdu->save();
        }
        return redirect()->route('admin/h-prestasi')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function tampil($id)
    {

        $db_smpitdu = Juara::find($id);
        return view('admin/tampilkanjuara', compact('db_smpitdu'));
    }

    public function updatedatajuara(Request $request, $id)
    {
        $this->validate($request,[
            'juara' => 'required',
        ]);
        $db_smpitdu = Juara::find($id);
        $db_smpitdu->update($request->all());
        if($request->hasFile('medal')){
            $request->file('medal')->move('medaljuara/', $request->file('medal')->getClientOriginalName());
            $db_smpitdu->medal = $request->file('medal')->getClientOriginalName();
            $db_smpitdu->save();
        }
        return redirect()->route('admin/h-prestasi')->with('success', 'Data Berhasil Di Update');
    }

    public function delete($id)
    {
        $db_smpitdu = Juara::find($id);
        $db_smpitdu->delete();
        return redirect()->route('admin/h-prestasi')->with('success', 'Data Berhasil Di Hapus');
    }

    public function trash()
    {
        // mengampil data guru yang sudah dihapus
        $db_smpitdu = Juara::onlyTrashed()->get();
        return view('admin/trashjuara', ['db_smpitdu' => $db_smpitdu]);
    }

    public function restore($id)
    {
        $db_smpitdu = Juara::onlyTrashed()->where('id', $id);
        $db_smpitdu->restore();
        return redirect()->route('admin/h-prestasi')->with('success', 'Data Berhasil Di Restore');
    }

    public function restoreall()
    {

        $db_smpitdu = Juara::onlyTrashed();
        $db_smpitdu->restore();

        return redirect()->route('admin/h-prestasi')->with('success', 'Data Berhasil Di Restore');
    }

    public function hapuspermanen($id)
    {
        // hapus permanen data guru
        $db_smpitdu = Juara::onlyTrashed()->where('id', $id);
        $db_smpitdu->forceDelete();

        return redirect()->route('admin/trashjuara')->with('success', 'Data Berhasil Di Hapus Permanen');
    }

    public function hapuspermanenall()
    {
        // hapus permanen semua data guru yang sudah dihapus
        $db_smpitdu = Juara::onlyTrashed();
        $db_smpitdu->forceDelete();

        return redirect()->route('admin/trashjuara')->with('success', 'Data Berhasil Di Hapus Permanen Semua');
    }


}
