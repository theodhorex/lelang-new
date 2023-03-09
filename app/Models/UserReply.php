<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Massage;
use App\Models\Postingan;

class UserReply extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'postingan_id',
        'receipent_name',
        'postal_code',
        'phone_number',
        'address',
        'desc'
    ];

    protected $table = 'user_replies';

    public function user(){
        return $this -> hasOne(User::class, 'id', 'user_id');
    }

    public function inbox(){
        return $this -> hasOne(Massage::class, 'id', 'inbox_id');
    }

    public function bidData(){
        return $this -> hasMany(BidData::class, 'id', 'postingan_id');
    }

    public function postingan(){
        return $this -> hasOne(Postingan::class, 'id', 'postingan_id');
    }
}