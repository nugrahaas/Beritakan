<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{	
	public $table = 't_berita';

	protected $fillable = [
		'id_berita', 'judul_berita', 'isi_berita', 'genre_berita', 'foto_berita'
	];




}
