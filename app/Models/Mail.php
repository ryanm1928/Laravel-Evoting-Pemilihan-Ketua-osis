<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
	use HasFactory;

	public function  user()
	{
		return $this->belongsTo(User::class,'user_id');

	}

	public function balas()
	{
		return $this->hasMany(Reply::class,'id_pesan');
	}



}
