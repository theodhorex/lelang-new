<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Postingan;
use App\Models\UserReply;

class Massage extends Model
{
    use HasFactory;

    protected $table = 'massages';
    protected $fillable = [
        'massage',
        'admin_id',
        'user_id',
        'postingan_id',
        'is_reply',
    ];

    public function postingan(){
        return $this -> hasOne(Postingan::class,"id", "postingan_id");
    }

    public function admin(){
        return $this -> hasOne(User::class, 'id', 'admin_id');
    }

    public function officer(){
        return $this -> hasOne(User::class, 'id', 'officer_id');
    }

    public function isReplies(){
        return $this -> hasOne(UserReply::class);
    }
}