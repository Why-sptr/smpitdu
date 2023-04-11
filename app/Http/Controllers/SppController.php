<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use Illuminate\Http\Request;

class SppController extends Controller
{
    public function index2(){
        $db_smpitdu = Spp::with('sppable')->get();
        return response()->json([
            'status' => "success",
            "data" => $db_smpitdu,
        ]);
    }
}
