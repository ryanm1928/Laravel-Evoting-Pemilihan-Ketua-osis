<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
	use HasFactory;



	public function creator()
	{
		return $this->belongsTo(User::class,'created_by');
	}
	public function choice()
	{
		return $this->hasMany(Choice::class,'poll_id');
	}
	public function vote()
	{
		return $this->hasMany(Vote::class,'poll_id');
	}
}
