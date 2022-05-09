<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Resturent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ActivityController extends Controller
{
    public function index()
    {
        $resturent = Resturent::where('user_id',Auth::id())->first();
        if($resturent)
        {
        $activity =Activity::where('user_id',Auth::id())->get();
        
        return view('log.index',compact('activity'));
        } else{
            abort(403,'Access Denied');
        }
    }
}
