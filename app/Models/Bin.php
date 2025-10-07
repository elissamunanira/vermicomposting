<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bin extends Model
{
    use HasFactory;
    protected $fillable=[
        "code",
        "microcontroller_type",
        'status',
        "worm_type",
        'province',
        'district',
        'sector',
        'cell',
        "member_id",
        "cooperative_id"
    ];




    public function binconditions(){

        return $this->hasMany(Bincondition::class,'bin_id','id');
    }


    public function harvestings()
    {
        return $this->hasMany(Harvesting::class);
    }


    public function plantings()
    {
        return $this->hasMany(Planting::class);
    }



    public function member(){
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }





}
