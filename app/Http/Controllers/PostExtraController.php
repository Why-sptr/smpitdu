<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\PostExtra;
use Illuminate\Http\Request;

class PostExtraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $db_smpitdu = PostExtra::where('judul','LIKE','%' .$request->search.'%')->paginate(5);

        }else{
            $db_smpitdu = PostExtra::with('images')->paginate(5);
           
        } return view('admin/h-extrakulikuler', ['db_smpitdu' => $db_smpitdu]);
    }

    public function index2(){
        $db_smpitdu = PostExtra::with('images')->get();
        return response()->json([
            'status' => "success",
            "data" =>$db_smpitdu,
        ]);
    }

    public function detail($id)
    {
        $db_smpitdu = PostExtra::with('images')->find($id);
       
        return view('admin/tabelextra', compact('db_smpitdu'));
    }

   
    public function store(Request $request)
    {
        $this->validate($request,[
            
            'judul' => 'required',
            'cover' => 'required',
            'jadwal' => 'required',
            'jam' => 'required',
            'lokasi' => 'required',
            'tentang' => 'required',
        ]);

        if($request->hasFile("cover")){
            $file = $request->file("cover");
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path("cover/"),$imageName);

            $post =new PostExtra([
                "judul" =>$request->judul,
                "cover" =>$imageName,
                "jadwal" =>$request->jadwal,
                "jam" =>$request->jam,
                "lokasi" =>$request->lokasi,
                "tentang" =>$request->tentang,
            ]);
            $post->save();
        }

        if($request->hasFile("images")){
            $files = $request->file("images");
            foreach($files as $file){
                $imageName = time() . '_' . $file->getClientOriginalName();
                $request['post_extras_id'] = $post->id;
                $request['image'] = $imageName;
                $file->move(\public_path("/images"), $imageName);
                Image::create($request->all());
            }
        }

        return redirect()->route('admin/h-extrakulikuler')->with('success', 'Data Berhasil Di Tambahkan');
    }

    
    public function edit($id)
    {
        $db_smpitdu = PostExtra::findOrFail($id);
        return view('admin/editextrakulikuler')->with('db_smpitdu', $db_smpitdu);
    }

    public function updatedataextra(Request $request, $id)
    {

        $post=PostExtra::findOrFail($id);
        $this->validate($request,[
            
            'judul' => 'required',
            'jadwal' => 'required',
            'jam' => 'required',
            'lokasi' => 'required',
            'tentang' => 'required',
        ]);

        if($request->hasFile("cover")){
            $file = $request->file("cover");
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path("cover/"),$imageName);

            $post->update([
                "judul" =>$request->judul,
                "cover" =>$imageName,
                "jadwal" =>$request->jadwal,
                "jam" =>$request->jam,
                "lokasi" =>$request->lokasi,
                "tentang" =>$request->tentang,
            ]);
            
        }

        if($request->hasFile("images")){
            $files = $request->file("images");
            foreach($files as $file){
                $imageName = time() . '_' . $file->getClientOriginalName();
                $request['post_extras_id'] = $post->id;
                $request['image'] = $imageName;
                $file->move(\public_path("/images"), $imageName);
                Image::create($request->all());
            }
        }
        $post->update([
                "judul" =>$request->judul,
                "jadwal" =>$request->jadwal,
                "jam" =>$request->jam,
                "lokasi" =>$request->lokasi,
                "tentang" =>$request->tentang,
            ]);
            $post->save();

        return redirect()->route('admin/h-extrakulikuler')->with('success', 'Data Berhasil Di Update');
    }

   

    public function delete($id)
    {
        $db_smpitdu = PostExtra::find($id);
        $db_smpitdu->delete();
        return redirect()->route('admin/h-extrakulikuler')->with('success', 'Data Berhasil Di Hapus');
    }

    public function tampil($id)
    {

        $db_smpitdu = PostExtra::find($id);
        return view('admin/tampilkanextra', compact('db_smpitdu'));
    }
    public function trash(Request $request)
    {
        // mengampil data guru yang sudah dihapus
        if($request->has('search')){
            $db_smpitdu = PostExtra::where('judul','LIKE','%' .$request->search.'%')->paginate(5);

        }else{
            $db_smpitdu = PostExtra::onlyTrashed()->paginate(5);
           
        } return view('admin/trashextra', ['db_smpitdu' => $db_smpitdu]);
    }

    public function restoreextra($id)
    {
        $db_smpitdu = PostExtra::onlyTrashed()->where('id', $id);
        $db_smpitdu->restore();
        return redirect()->route('admin/h-extrakulikuler')->with('success', 'Data Berhasil Di Restore');
    }

    public function restoreextraall()
    {

        $db_smpitdu = PostExtra::onlyTrashed();
        $db_smpitdu->restore();

        return redirect()->route('admin/h-extrakulikuler')->with('success', 'Data Berhasil Di Restore');
    }

    public function hapuspermanenextra($id)
    {
        // hapus permanen data guru
        $db_smpitdu = PostExtra::onlyTrashed()->where('id', $id);
        $db_smpitdu->forceDelete();

        return redirect()->route('admin/trashextra')->with('success', 'Data Berhasil Di Hapus Permanen');
    }

    public function hapuspermanenextraall()
    {
        // hapus permanen semua data guru yang sudah dihapus
        $db_smpitdu = PostExtra::onlyTrashed();
        $db_smpitdu->forceDelete();

        return redirect()->route('admin/trashextra')->with('success', 'Data Berhasil Di Hapus Permanen Semua');
    }

}
