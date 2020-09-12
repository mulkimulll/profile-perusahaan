<?php

namespace App\Modules\Order\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Input;
use Carbon\Carbon;
use Auth;
use Storage;

class OrderController extends Controller
{
    public function index()
    {
        return view("Order::index");
    }

    function load()
    {
        
    }
}
