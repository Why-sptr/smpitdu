<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Siswa7b;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'gagal password salah'
            ], 401);
        }

        $token = $user->createToken('token-name')->plainTextToken;

        return response()->json([
            'message' => 'berhasil login',
            'user' => $user,
            'token' => $token,
        ], 200);
    }

    public function loginSiswa(Request $request)
    {
        $siswa = Siswa7b::where('id', $request->id)->get();

        if (!$siswa || $request->password != $siswa->first()->password) {
            return response()->json([
                'message' => 'gagal password salah'
            ], 401);
        }

        $token = $siswa->first()->createToken('token-name')->plainTextToken;

        $siswa_jadi = [
            'id' => $siswa->first()->id,
            'foto' => $siswa->first()->foto,
            'nama' => $siswa->first()->nama,
            'kelas' => $siswa->first()->kelas,
            'link' => $siswa->first()->link,
        ];

        return response()->json([
            'message' => 'berhasil login',
            'user' => $siswa_jadi,
            'token' => $token,
        ], 200);
    }

    public function getSpps(Request $request)
    {
        $siswa = $request->user();

        $spps = $siswa->spps->groupBy('tahun_ajaran')->map(function ($spp) {
            return $spp;
        })->toArray();

        $spps_jadi = collect($spps)->map(function ($spp, $tahun) {
            return [
                'tahun' => $tahun,
                'spp' => $spp,
            ];
        })->values();

        return response()->json([
            'spps' => $spps_jadi,
        ], 200);
    }
}
