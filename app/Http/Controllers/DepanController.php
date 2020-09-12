<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Input;
use Carbon\Carbon;
use Auth;
use Storage;

class DepanController extends Controller
{
    public function index()
    {
        $r=DB::select("SELECT * FROM front");

        return view('index', compact('r'));
    }

}
