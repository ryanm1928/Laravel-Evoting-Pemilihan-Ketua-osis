<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
	use HasFactory;

	public function voteuser()
	{
		return $this->belongsTo(User::class,'user_id');
	}
	public function polling()
	{
		return $this->belongsTo(Poll::class,'poll_id');
	}
	public function choice()
	{
		return $this->belongsTo(Choice::class,'choice_id');
	}
}
