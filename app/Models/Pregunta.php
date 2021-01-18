<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
	public $timestamps = false;
	protected $fillable = ['producto_id','pregunta','hora_p','quien_p','respuesta'];

	public function quien()
	{
		return $this->hasOne('App\Models\User','id','quien_p');
	}
	public function producto()
	{
		return $this->hasOne('App\Models\producto','id','producto_id');
	}
}
