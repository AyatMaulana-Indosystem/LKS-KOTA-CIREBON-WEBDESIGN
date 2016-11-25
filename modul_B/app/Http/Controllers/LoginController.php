<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Validator;
use Redirect;

use App\User;
use App\peserta;

class LoginController extends Controller
{
	public function showLogin(){
		return view('auth.login');
	}

	public function doLogin(Request $request){

			$data_login = [
				'username' => $request->username,
				'password' => $request->password
			];

			if (\Auth::attempt($data_login)) {

				if (\Auth::user()->level == 1) {
					return Redirect::to('admin');
				}
				else{
					return Redirect::to('peserta');
				}

			}
			else{
				return Redirect::to('/');
			}
	}

	public function showRegister(){
		return view('auth.register');
	}

	public function doRegister(Request $request){
		$data = $request->all();

		$validasi = Validator::make($data,[
			'nama_lengkap' => 'required',
			'username'     => 'required|max:16|min:4|unique:users,username',
			'password'	   => 'required|max:16|min:4|confirmed',
			'id_kontingen' => 'required',
			'jenis_kelamin' => 'required',
			'tempat_lahir'  => 'required',
			'tanggal_lahir' => 'required'
		]);

		if ($validasi->fails()) {
			return $validasi->errors()->all();
		}
		else{
			$user = User::create([
				'username' => $request->username,
				'password' => bcrypt($request->password),
				'level'		=> 2
			]);

			$data['id_user']  = User::orderBy('id_user','DESC')->get()[0]->id_user;

			$peserta = peserta::create($data);

			$data_login = [
				'username' => $request->username,
				'password' => $request->password
			];

			if (\Auth::attempt($data_login)) {
				return \Auth::user();
			}
			else{
				return \Auth::user();
			}
		}

	}	

}
