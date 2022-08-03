<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
	use HasFactory;

	protected $table = 'municipality';

	protected $fillable = [
		'id',
		'district',
		'name',
		'id_ibge',
		'id_city'
	];
}
