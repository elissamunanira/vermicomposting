<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Member extends Model
{

    use HasFactory;

    protected $fillable = [
        'firstname','secondname','gender',
        'age','province','district','sector','cell','cooperative_id','phonenumber','email'
    ];


    public function cooperative()

    {

           return $this->belongsTo(Cooperative::class, 'cooperative_id');

    }

    public function bin()

    {

           return $this->hasMany(Bin::class, 'member_id','id');

    }


}
