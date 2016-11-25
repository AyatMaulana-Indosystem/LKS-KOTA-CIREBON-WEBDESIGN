<?php

namespace App\Http\Controllers\Peserta;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\bidang_lomba;
use App\registrasi_peserta;
use App\peserta;

class BidangLombaController extends Controller
{
	public function index(){
		$data['bidang_lomba'] = bidang_lomba::all();


		return view('peserta.bidang_lomba', compact('data'));
	}


	public function daftar($id_bidang_lomba)
	{
		$id_user = \Auth::user()->id_user;

		$get_peserta = peserta::where('id_user','=',$id_user)->get();

		registrasi_peserta::create([
			'id_peserta' => $get_peserta[0]->id_peserta,
			'id_bidang_lomba' => $id_bidang_lomba
		]);

		return \Redirect::to('peserta/bidang-lomba')->with('sc_msg','Berhasil mendaftar Bidang Lomba');
	}

	public function batal($id_bidang_lomba)
	{
		$id_user = \Auth::user()->id_user;

		$get_peserta = peserta::where('id_user','=',$id_user)->get();

		registrasi_peserta::where('id_peserta','=',$get_peserta[0]->id_peserta)->delete();

		return \Redirect::to('peserta/bidang-lomba')->with('sc_msg','Berhasil mendaftar Bidang Lomba');

	}

}
