<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\registrasi_peserta;
use App\peserta;
use App\bidang_lomba;

use Redirect;

class RegistrasiPesertaController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}

	public function index(){
		$data['peserta']  = peserta::with('registrasi')->get();
		$data['peserta_reg'] = registrasi_peserta::all();
		$data['bidang_lomba'] = bidang_lomba::all();

		// print_r($data);
 // return $data;
		return view('admin.registrasi-peserta', compact('data'));
 	}

	public function plus(Request $request){

		foreach ($request->id_peserta as $key => $value) {
			registrasi_peserta::create([
				'id_peserta' => $value,
				'id_bidang_lomba' => $request->id_bidang_lomba
			]);
		}


		return Redirect::to('admin/registrasi-peserta')->with('sc_msg','Berhasil menambah Peserta');	
	}

	public function minus($id_peserta)
	{
		registrasi_peserta::find($id_peserta)->delete();

		return Redirect::to('admin/registrasi-peserta')->with('sc_msg','Berhasil Menghapus Peserta');

	}


	public function update(Request $request)
	{
		kontingen::find($request->id_kontingen)->update($request->all());

		return Redirect::to('admin/kontingen')->with('sc_msg','Berhasil Mengedit Peserta');
	}

	public function destroy($id_kontingen){
		kontingen::find($id_kontingen)->delete();

		return Redirect::to('admin/kontingen')->with('sc_msg','Berhasil Menghapus Peserta');

	}
}
