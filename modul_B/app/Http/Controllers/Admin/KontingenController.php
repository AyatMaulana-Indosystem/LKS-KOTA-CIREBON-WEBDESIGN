<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\kontingen;

use Redirect;

class KontingenController extends Controller
{
	public function index(){
		$data['kontingen']  = kontingen::all();

		return view('admin.kontingen', compact('data'));
 	}

	public function create(Request $request){
		kontingen::create($request->all());

		return Redirect::to('admin/kontingen')->with('sc_msg','Berhasil menambah Kontingen');	
	}

	public function update(Request $request)
	{
		kontingen::find($request->id_kontingen)->update($request->all());

		return Redirect::to('admin/kontingen')->with('sc_msg','Berhasil Mengedit Kontingen');
	}

	public function destroy($id_kontingen){
		kontingen::find($id_kontingen)->delete();

		return Redirect::to('admin/kontingen')->with('sc_msg','Berhasil Menghapus Kontingen');

	}
}
