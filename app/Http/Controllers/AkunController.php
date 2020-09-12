<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Input;
use Auth;
use App\User;
use jeremykenedy\LaravelRoles\Models\Role;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{
    public function index()
    {
        return view('akun.index');
    }

    // function load()
    // {
    //     return view("akun._table");
    // }
}
