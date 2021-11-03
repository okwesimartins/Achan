<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class achan_branch extends Model
{
    use HasFactory;
    protected $table = 'achan_branches';

    protected $fillable = [
        'title', 'airport', 'state','phone_num','wha_num','name','email','phone','password','slot_count'
    ];
}
