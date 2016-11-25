<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class registrasi_peserta extends Model
{
	protected $table = 'registrasi_peserta';
	protected $fillable = [
		'id_peserta',
		'id_bidang_lomba',
		'score',
		'keterangan'
	];

	protected $primaryKey = 'id_peserta';
	public $timestamps = FALSE;

	public function peserta(){
		return $this->hasOne('App\peserta','id_peserta');
	}
}
