<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class peserta extends Model
{
	protected $table = 'peserta';
	protected $fillable = [
		'nama_lengkap',
		'jenis_kelamin',
		'id_kontingen',
		'tempat_lahir',
		'tanggal_lahir',
		'foto',
		'id_user'
	];

	protected $primaryKey = 'id_peserta';
	public $timestamps = FALSE;

	public function registrasi(){
		return $this->belongsTo('App\registrasi_peserta','id_peserta');
	}
}
