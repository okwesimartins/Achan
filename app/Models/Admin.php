<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use App\Models\User;
use App\Models\admin_user;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;
   
    protected $fillable = [
        'name', 'email', 'password','adminid',
    ];

    protected $hidden = ['password','created_at','updated_at','pivot','email_verified'];

    public function branches(){
        return $this->belongsToMany(User::class,admin_user::class,'admin_id','user_id');
    }

    public function getRouteKeyName(){
        return 'adminid';
    }
}
