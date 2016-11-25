<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Redirect;

use App\bidang_lomba;

class BidangLombaController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}

	public function index(){
		$data['bidang_lomba']  = bidang_lomba::all();

		return view('admin.bidang_lomba', compact('data'));
 	}

	public function create(Request $request){
		bidang_lomba::create($request->all());

		return Redirect::to('admin/bidang-lomba')->with('sc_msg','Berhasil menambah bidang_lomba');	
	}

	public function update(Request $request)
	{
		bidang_lomba::find($request->id_bidang_lomba)->update($request->all());

		return Redirect::to('admin/bidang-lomba')->with('sc_msg','Berhasil Mengedit bidang_lomba');
	}

	public function destroy($id_bidang_lomba){
		bidang_lomba::find($id_bidang_lomba)->delete();

		return Redirect::to('admin/bidang-lomba')->with('sc_msg','Berhasil Menghapus bidang_lomba');

	}
}
