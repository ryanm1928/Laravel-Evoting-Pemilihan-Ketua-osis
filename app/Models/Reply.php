<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
	use HasFactory;

	public function mails()
	{
		return $this->belongsTo(Mail::class,'id_pesan');
	}

	
}
