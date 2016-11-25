<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Redirect;

use App\registrasi_peserta;
use App\peserta;


class PenilaianController extends Controller
{
	public function index(){
		$data['registrasi_peserta']  = registrasi_peserta::with('peserta')->orderBy('id_bidang_lomba','DESC')->get();
		// return $data;
		return view('admin.penilaian', compact('data'));
 	}


	public function update(Request $request)
	{
		registrasi_peserta::find($request->id_peserta)->update($request->all());

		return Redirect::to('admin/penilaian')->with('sc_msg','Berhasil Mengedit Nilai');
	}

}
