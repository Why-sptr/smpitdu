<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\ImagesEvent;
use App\Models\StatusEvent;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $db_smpitdu = Event::where('event','LIKE','%' .$request->search.'%')->paginate(5);

        }else{
            $db_smpitdu = Event::with('images_events')->paginate(5);
           
        } return view('admin/e-nextevent', ['db_smpitdu' => $db_smpitdu]);
       
    }

    public function Event1(){

        $db_smpitdu = Event::where('status','LIKE','Yang Akan Datang')->with('images_events')->get();
        return response()->json([
            'status' => "success",
            "data" =>$db_smpitdu,
        ]);
    }
    public function Event2(){

        $db_smpitdu = Event::where('status','LIKE','Yang Telah Berlalu')->with('images_events')->get();
        return response()->json([
            'status' => "success",
            "data" =>$db_smpitdu,
        ]);
    }


    public function tambahevent()
    {
        $db_smpitdu = StatusEvent::all();
        return view('admin/tambahdataevent',compact('db_smpitdu'));
    }

    public function insertEvent(Request $request)
    {
        $this->validate($request,[
            'foto' => 'required',
            'event' => 'required',
            'peserta' => 'required',
            'tanggal' => 'required',
            'lokasi' => 'required',
            'tentang' => 'required',
            'status' => 'required|in:Yang Akan Datang,Yang Telah Berlalu'
        ],[
            'status' => 'status tidak boleh kosong'
        ]);
        // $db_smpitdu =  Event::create($request->all());
        // if($request->hasFile('foto')){
        //     $request->file('foto')->move('fotoevent/', $request->file('foto')->getClientOriginalName());
        //     $db_smpitdu->foto = $request->file('foto')->getClientOriginalName();
        //     $db_smpitdu->save();
        // }
        if($request->hasFile("foto")){
            $file = $request->file("foto");
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path("fotoevent/"),$imageName);

            $post =new Event([
                "event" =>$request->event,
                "foto" =>$imageName,
                "peserta" =>$request->peserta,
                "tanggal" =>$request->tanggal,
                "lokasi" =>$request->lokasi,
                "status" =>$request->status,
                "tentang" =>$request->tentang,
            ]);
            $post->save();
        }

        if($request->hasFile("images_events")){
            $files = $request->file("images_events");
            foreach($files as $file){
                $imageName = time() . '_' . $file->getClientOriginalName();
                $request['events_id'] = $post->id;
                $request['image'] = $imageName;
                $file->move(\public_path("/images_events"), $imageName);
                ImagesEvent::create($request->all());
            }
        }

        return redirect()->route('admin/e-nextevent')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function tampil($id)
    {

        $db_smpitdu = Event::find($id);
        return view('admin/tampilkanevent', compact('db_smpitdu'));
    }

    public function detail($id)
    {

        $db_smpitdu = Event::find($id);
        return view('admin/tabelevent', compact('db_smpitdu'));
    }

    public function updatedataevent(Request $request, $id)
    {
        $post=Event::findOrFail($id);
        $this->validate($request,[
            
            'event' => 'required',
            'peserta' => 'required',
            'tanggal' => 'required',
            'lokasi' => 'required',
            'tentang' => 'required',
            'status' => 'required|in:Yang Akan Datang,Yang Telah Berlalu'
        ],[
            'status' => 'status tidak boleh kosong'
        ]);
        // $db_smpitdu = Event::find($id);
        // $db_smpitdu->update($request->all());
        // if($request->hasFile('foto')){
        //     $request->file('foto')->move('fotoevent/', $request->file('foto')->getClientOriginalName());
        //     $db_smpitdu->foto = $request->file('foto')->getClientOriginalName();
        //     $db_smpitdu->save();
        // }
       
        if($request->hasFile("foto")){
            $file = $request->file("foto");
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path("fotoevent/"),$imageName);

            $post->update([
                "event" =>$request->event,
                "foto" =>$imageName,
                "peserta" =>$request->peserta,
                "tanggal" =>$request->tanggal,
                "lokasi" =>$request->lokasi,
                "status" =>$request->status,
                "tentang" =>$request->tentang,
            ]);
        }

        if($request->hasFile("images_events")){
            $files = $request->file("images_events");
            foreach($files as $file){
                $imageName = time() . '_' . $file->getClientOriginalName();
                $request['events_id'] = $post->id;
                $request['image'] = $imageName;
                $file->move(\public_path("/images_events"), $imageName);
                ImagesEvent::create($request->all());
            }
        }
        $post->update([
            "event" =>$request->event,
            "peserta" =>$request->peserta,
            "tanggal" =>$request->tanggal,
            "lokasi" =>$request->lokasi,
            "status" =>$request->status,
            "tentang" =>$request->tentang,
        ]);
        $post->save();

        return redirect()->route('admin/e-nextevent')->with('success', 'Data Berhasil Di Update');
    }

    public function delete($id)
    {
        $db_smpitdu = Event::find($id);
        $db_smpitdu->delete();
        return redirect()->route('admin/e-nextevent')->with('success', 'Data Berhasil Di Hapus');
    }

    public function trash(Request $request)
    {
        // mengampil data guru yang sudah dihapus
        if($request->has('search')){
            $db_smpitdu = Event::where('event','LIKE','%' .$request->search.'%')->paginate(5);

        }else{
            $db_smpitdu = Event::onlyTrashed()->paginate(5);
           
        } return view('admin/trashevent', ['db_smpitdu' => $db_smpitdu]);
    }

    public function restoreevent($id)
    {
        $db_smpitdu = Event::onlyTrashed()->where('id', $id);
        $db_smpitdu->restore();
        return redirect()->route('admin/e-nextevent')->with('success', 'Data Berhasil Di Restore');
    }

    public function restoreeventall()
    {

        $db_smpitdu = Event::onlyTrashed();
        $db_smpitdu->restore();

        return redirect()->route('admin/e-nextevent')->with('success', 'Data Berhasil Di Restore');
    }

    public function hapuspermanenevent($id)
    {
        // hapus permanen data guru
        $db_smpitdu = Event::onlyTrashed()->where('id', $id);
        $db_smpitdu->forceDelete();

        return redirect()->route('admin/trashevent')->with('success', 'Data Berhasil Di Hapus Permanen');
    }

    public function hapuspermaneneventall()
    {
        // hapus permanen semua data guru yang sudah dihapus
        $db_smpitdu = Event::onlyTrashed();
        $db_smpitdu->forceDelete();

        return redirect()->route('admin/trashevent')->with('success', 'Data Berhasil Di Hapus Permanen Semua');
    }


    
}
