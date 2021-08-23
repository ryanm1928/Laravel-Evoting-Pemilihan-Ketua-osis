<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $fillable = ['name','username','password','role','kelas_id'];


    public function userkelas()
    {
        return $this->belongsTo(Kelas::class,'kelas_id');
    }
    public function voteuser()
    {
        return $this->hasMany(Vote::class,'user_id');
    }
    
}
