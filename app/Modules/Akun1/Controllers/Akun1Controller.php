<?php

namespace App\Modules\Akun1\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Input;
use Carbon\Carbon;
use Auth;
use Storage;

class Akun1Controller extends Controller
{
    public function index()
    {
        return view("Akun1::index");
    }

    function load()
    {
        switch (Input::get('a')) {
			case '_table':
                return view("Akun1::_table");
                break;
            case '_input':
                $r=DB::select("SELECT * FROM user1 a where id=?",[Input::get('id')]);
                if ($r) {
                    $r=$r[0];
                }
				// dd($r);
                return view("Akun1::_input",compact('r'));
                break;
            default:
                return '!! Missing component !!';
                break;
        }
    }

    function data()
    {
        switch (Input::get('a')) {
			case 'getakun':
				$r=DB::select("select id,username,name,email,alamat from user1");
				return json_encode($r);
				break;
			case 'uploadnew':
                DB::transaction(function(){
                    // upload file
                    $file = Input::file('file');
					$now = Carbon::now();
					$nmBerkas=pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

					$fn=$nmBerkas.'.'.$file->getClientOriginalExtension();
					$path = "Berkas/";
					Storage::putFileAs($path,$file,$fn);
					$path = $path.$fn;

					$i=DB::insert("INSERT INTO user1
                            (username,name,email,alamat,foto,crttime)
                        VALUES
                            (?,?,?,?,?,?)
                    ",[Input::get('username'),Input::get('name'),Input::get('email'),Input::get('alamat'),$path,$now]);
                });

				return json_encode('ok');
                break;

            case 'edit':
				DB::transaction(function(){
					// upload file
					$file = Input::file('file');
					$thp = Input::get('tahap');
					// $nmBerkas=Input::get('nmBerkas');
					$nmBerkas=pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

					$fn=$nmBerkas.'.'.$file->getClientOriginalExtension();
					$path = "Berkas perkara/";
					Storage::putFileAs($path,$file,$fn);
					$path = $path.$fn;

					$n=DB::update("UPDATE dokman00100
	                    SET
							tahap=?,
							nmBerkas=?,
							dokBerkas=?,
	                        mdfuser=?
	                    WHERE
	                        id=?
                    ",[$thp,$nmBerkas,$path,
                    Auth::user()->name,Input::get('id')]);
				});
				Storage::delete(Input::get('oldFile'));

                return json_encode('ok');
                break;

            case 'delete':
				DB::transaction(function(){
					$n=DB::update("DELETE FROM user1
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

    // function data()
    // {
    //     switch (Input::get('a')) {
    //         case 'getakun':
	// 			$r=DB::select("SELECT
    //                     a.id,
    //                 	a.name,
    //                     a.username,
	// 					group_concat(role_id) role_id,
	// 					group_concat(description) role
    //                 from
    //                 	user1 a
    //                     join role_user b
    //                 		on a.id=b.user_id
    //                 	join roles c
    //                 		on b.role_id=c.id
    //                 where
    //                     role_id not in(69)
	// 				group by
	// 					a.id,
	// 					a.name,
	// 					a.username
	// 			");

	// 			return json_encode($r);
    //             break;

    //         case 'edit':
    //             if (Input::get('password')<>Input::get('password_confirmation')) {
    //                 header('HTTP/1.1 500 Internal Server Booboo');
    //                 header('Content-Type: application/json; charset=UTF-8');
	// 				die(json_encode('Kata sandi tidak cocok'));
    //             }
    //             $user=User::find(Input::get('id'));
	// 			if(Input::get('password')){
	// 				$user->password = Hash::make(Input::get('password'));
	// 			}
	// 			$user->name = Input::get('name');
	// 			$user->email = Input::get('email');

    //             $user->detachAllRoles();
	// 			if(Input::get('roles')){
	// 				foreach (Input::get('roles') as $key => $value) {
	// 					$user->attachRole($value);
	// 				}
	// 			}
    //             $user->save();

    //             return json_encode($user);
    //             break;

	// 		case 'edit-pass':
	// 			$current_password = Auth::User()->password;
	// 	        if(Hash::check(Input::get('password-old'), $current_password))
	// 			{}
	// 	        else
	// 	        {
	// 	          $error = 'Kata sandi lama salah';
	// 	          return response()->json($error, 400);
	// 	        }

	// 			if (Input::get('password')<>Input::get('password_confirmation')) {
	// 				header('HTTP/1.1 400 Internal Server Booboo');
	// 				header('Content-Type: application/json; charset=UTF-8');
	// 				die(json_encode('Kata sandi tidak cocok'));
	// 			}

	// 			$user=User::find(Input::get('id'));
	// 			$user->password = Hash::make(Input::get('password'));
	// 			$user->save();

	// 			return json_encode($user);
	// 			break;

    //         case'destroy':
    //             $id=Input::get('id');

    //             $user = User::findOrFail($id);
    //             $user->delete();

    //             return json_encode('sukses');
    //             break;

    //         default:
    //             return 'Undefined';
    //             break;
    //     }
    // }
}
