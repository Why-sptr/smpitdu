<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;
use Illuminate\Http\Response as HttpResponse;
use Laravel\Sanctum\Sanctum;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $db_smpitdu = Form::where('judul','LIKE','%' .$request->search.'%')->paginate(5);

        }else{
            $db_smpitdu = Form::paginate(5);
           
        } return view('admin/f-informasi-ppdb', ['db_smpitdu' => $db_smpitdu]);
       
    }

    public function index2(){
        $db_smpitdu = Form::all();
        return response()->json([
            'status' => "success",
            "data" =>$db_smpitdu,
        ]);
    }

    

    //
    public function viewer($id){
        $db_smpitdu = Form::find($id);

        return view('admin/viewfile', compact('db_smpitdu'));
    }


    public function tambahform()
    {
        return view('admin/tambahdataform');
    }

    public function insertform(Request $request)
    {
        $this->validate($request,[
            'file' => 'required',
            'judul' => 'required',
        ]);
        $db_smpitdu =  Form::create($request->all());
        if($request->hasFile('file')){
            $request->file('file')->move('fileform/', $request->file('file')->getClientOriginalName());
            $db_smpitdu->file = $request->file('file')->getClientOriginalName();
            $db_smpitdu->save();
        }
        return redirect()->route('admin/f-informasi-ppdb')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function tampil($id)
    {

        $db_smpitdu = Form::find($id);
        return view('admin/tampilkanform', compact('db_smpitdu'));
    }

    public function updatedataform(Request $request, $id)
    {
        $this->validate($request,[
            'judul' => 'required',
        ]);
        $db_smpitdu = Form::find($id);
        $db_smpitdu->update($request->all());
        if($request->hasFile('file')){
            $request->file('file')->move('fileform/', $request->file('file')->getClientOriginalName());
            $db_smpitdu->file = $request->file('file')->getClientOriginalName();
            $db_smpitdu->save();
        }
        return redirect()->route('admin/f-informasi-ppdb')->with('success', 'Data Berhasil Di Update');
    }

    public function delete($id)
    {
        $db_smpitdu = Form::find($id);
        $db_smpitdu->delete();
        return redirect()->route('admin/f-informasi-ppdb')->with('success', 'Data Berhasil Di Hapus');
    }

    public function trash(Request $request)
    {
        // mengampil data guru yang sudah dihapus
        if($request->has('search')){
            $db_smpitdu = Form::where('judul','LIKE','%' .$request->search.'%')->paginate(5);

        }else{
            $db_smpitdu = Form::onlyTrashed()->paginate(5);
        } 
        return view('admin/trashform', ['db_smpitdu' => $db_smpitdu]);
    }

    public function restore($id)
    {
        $db_smpitdu = Form::onlyTrashed()->where('id', $id);
        $db_smpitdu->restore();
        return redirect()->route('admin/f-informasi-ppdb')->with('success', 'Data Berhasil Di Restore');
    }

    public function restoreall()
    {
        
        $db_smpitdu = Form::onlyTrashed();
        $db_smpitdu->restore();

        return redirect()->route('admin/f-informasi-ppdb')->with('success', 'Data Berhasil Di Restore');
    }

    public function hapuspermanen($id)
    {
        // hapus permanen data guru
        $db_smpitdu = Form::onlyTrashed()->where('id', $id);
        $db_smpitdu->forceDelete();

        return redirect()->route('admin/trashform')->with('success', 'Data Berhasil Di Hapus Permanen');
    }

    public function hapuspermanenall()
    {
        // hapus permanen semua data guru yang sudah dihapus
        $db_smpitdu = Form::onlyTrashed();
        $db_smpitdu->forceDelete();

        return redirect()->route('admin/trashform')->with('success', 'Data Berhasil Di Hapus Permanen Semua');
    }
}