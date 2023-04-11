<?php

namespace App\Http\Controllers;

use App\Models\StatusEvent;
use Illuminate\Http\Request;

class StatusEventController extends Controller
{
    public function index2(){

        $db_smpitdu =StatusEvent::with('event')->get();
        return response()->json([
            'status' => "success",
            "data" =>$db_smpitdu,
        ]);
    }

}
