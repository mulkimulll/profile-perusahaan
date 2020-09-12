<?php

namespace App\Modules\Front\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Input;
use Carbon\Carbon;
use Auth;
use Storage;

class FrontController extends Controller
{
    public function index()
    {
        return view("Front::index");
    }
    
    function load()
    {
        switch (Input::get('a')) {
			case '_table':
                return view("Front::_table");
                break;
            case '_input':
                $r=DB::select("SELECT * FROM front a where id=?",[Input::get('id')]);
                if ($r) {
                    $r=$r[0];
                }
				// dd($r);
                return view("Front::_input",compact('r'));
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
				$r=DB::select("SELECT * FROM front");
				return json_encode($r);
				break;
			case 'uploadnew':
                DB::transaction(function(){
					// upload file
					$file = Input::file('file');
					$now = Carbon::now();
					$nmBerkas=pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

					$fn=$nmBerkas.'.'.$file->getClientOriginalExtension();
					$path = "galeri/";
					Storage::putFileAs($path,$file,$fn);
					$path = $path.$fn;

					$i=DB::insert("INSERT INTO front
                            (gambar,dokBerkas,crtuser,crttime)
                        VALUES
                            (?,?,?,?)
                    ",[$nmBerkas,$path,Auth::user()->name,$now]);
                });

				return json_encode('ok');
                break;

            case 'edit':
				DB::transaction(function(){
					// upload file
					$file = Input::file('file');
					$nmBerkas=pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

					$fn=$nmBerkas.'.'.$file->getClientOriginalExtension();
					$path = "galeri/";
					Storage::putFileAs($path,$file,$fn);
                    $path = $path.$fn;
                    $now = Carbon::now();

					$n=DB::update("UPDATE front
	                    SET
							gambar=?,
							dokBerkas=?,
	                        crtuser=?,
                            crttime=?
	                    WHERE
	                        id=?
                    ",[$nmBerkas,$path,
                    Auth::user()->name,$now,Input::get('id')]);
				});
				Storage::delete(Input::get('oldFile'));

                return json_encode('ok');
                break;

            case 'delete':
				DB::transaction(function(){
					$n=DB::update("DELETE FROM front
						WHERE
							id=?
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
