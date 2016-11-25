<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kontingen extends Model
{
	protected $table = 'kontingen';
	protected $fillable = [
		'nama_kontingen'
	];

	protected $primaryKey = 'id_kontingen';
	public $timestamps = FALSE;
}
