<?php

namespace App\Modules\Stok\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Input;
use Carbon\Carbon;
use Auth;
use Storage;

class StokController extends Controller
{
    public function index()
    {
        return view("Stok::index");
    }

    function load()
    {
        switch (Input::get('a')) {
			case '_table':
                return view("Stok::_table");
                break;
            case '_input':
                $r=DB::select("SELECT * FROM stok_barang a where id=?",[Input::get('id')]);
                if ($r) {
                    $r=$r[0];
                }
				// dd($r);
                return view("Stok::_input",compact('r'));
                break;
            default:
                return '!! Missing component !!';
                break;
        }
    }
    function data()
    {
        switch (Input::get('a')) {
			case 'get':
				$r=DB::select("SELECT * FROM stok_barang");
				return json_encode($r);
				break;
			case 'savenew':
                DB::transaction(function(){

					$i=DB::insert("INSERT INTO stok_barang
                            (nm,kd_brg,jumlah,harga,crtuser,crttime)
                        VALUES
                            (?,?,?,?,?)
                    ",[Input::get('nm'),Input::get('kd_brg'),Input::get('jumlah'),Input::get('harga'),Auth::user()->name,Carbon::now()]);
                });

				return json_encode('ok');
                break;

            case 'edit':
				DB::transaction(function(){

					$n=DB::update("UPDATE stok_barang
	                    SET
                            nm=?,
							kd_brg=?,
							jumlah=?,
                            harga=?
	                    WHERE
	                        id=?
                    ",[Input::get('nm'),Input::get('kd_brg'),Input::get('jumlah'),Input::get('harga'),Input::get('id')]);
				});

                return json_encode('ok');
                break;

            case 'delete':
				DB::transaction(function(){
					$n=DB::update("DELETE FROM stok_barang where id=?
					",[Input::get('id')]);
				});

				return json_encode('ok');
                break;

            default:
                return 'Undefined';
                break;
        }
    }
}
