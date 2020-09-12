<?php

namespace App\Modules\Akun\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Input;
use Auth;
use App\User;
use jeremykenedy\LaravelRoles\Models\Role;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{

    function index()
    {
        return view("Akun::index");
    }

	function pass()
	{
		return view("Akun::pass");
	}
    function load()
    {
        switch (Input::get('a')) {
            case '_input':
                $roles=DB::select("
                    select * from roles where id not in (68,69)
                ");

                return view("Akun::_input",compact('roles'));
                break;
            case '_edit':
                $user=User::find(Input::get('id'));
                $roles=DB::select("
                    select * from roles where id not in (68,69)
                ");
                foreach ($user->roles as $user_role) {
                    $role = $user_role;
                }

                return view("Akun::_edit",compact('user','roles','role'));
                break;
            case '_table':
                return view("Akun::_table");
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
				$r=DB::select("SELECT
                        a.id,
                    	a.name,
                        a.username,
						group_concat(role_id) role_id,
						group_concat(description) role
                    from
                    	users a
                        join role_user b
                    		on a.id=b.user_id
                    	join roles c
                    		on b.role_id=c.id
                    where
                        role_id not in(69)
					group by
						a.id,
						a.name,
						a.username
				");

				return json_encode($r);
                break;

            case 'edit':
                if (Input::get('password')<>Input::get('password_confirmation')) {
                    header('HTTP/1.1 500 Internal Server Booboo');
                    header('Content-Type: application/json; charset=UTF-8');
					die(json_encode('Kata sandi tidak cocok'));
                }
                $user=User::find(Input::get('id'));
				if(Input::get('password')){
					$user->password = Hash::make(Input::get('password'));
				}
				$user->name = Input::get('name');
				$user->email = Input::get('email');

                $user->detachAllRoles();
				if(Input::get('roles')){
					foreach (Input::get('roles') as $key => $value) {
						$user->attachRole($value);
					}
				}
                $user->save();

                return json_encode($user);
                break;

			case 'edit-pass':
				$current_password = Auth::User()->password;
		        if(Hash::check(Input::get('password-old'), $current_password))
				{}
		        else
		        {
		          $error = 'Kata sandi lama salah';
		          return response()->json($error, 400);
		        }

				if (Input::get('password')<>Input::get('password_confirmation')) {
					header('HTTP/1.1 400 Internal Server Booboo');
					header('Content-Type: application/json; charset=UTF-8');
					die(json_encode('Kata sandi tidak cocok'));
				}

				$user=User::find(Input::get('id'));
				$user->password = Hash::make(Input::get('password'));
				$user->save();

				return json_encode($user);
				break;

            case'destroy':
                $id=Input::get('id');

                $user = User::findOrFail($id);
                $user->delete();

                return json_encode('sukses');
                break;

            default:
                return 'Undefined';
                break;
        }
    }

}
