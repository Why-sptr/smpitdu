<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\Guru;
use App\Models\Juara;
use App\Models\Prestasi;
use App\Models\Karyawan;
use App\Models\Kepala;
use App\Models\Image;
use App\Models\PostExtra;
use App\Models\ProfileSekolah;
use App\Models\WakilKepala;
use App\Models\WaliKelas;
use App\Models\Siswa7b;
use DB;


class DashboardController extends Controller
{
    public function home()
    {
        $profile_sekolahs = ProfileSekolah::count();
        $prestasis = Prestasi::count();
        $post_extras = PostExtra::count();
        $events = Event::count();
        $forms = Form::count();
        $kepala = Kepala::count();
        $wakil_kepalas = WakilKepala::count();
        $gurus = Guru::count();
        $karyawans = Karyawan::count();
        $siswa7bs = Siswa7b::count();

        return view('admin/dashboard', compact('profile_sekolahs','prestasis','post_extras','events','forms','kepala','wakil_kepalas',
        'gurus','karyawans','siswa7bs'));
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    
}
