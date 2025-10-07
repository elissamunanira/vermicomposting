<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Harvesting extends Model
{
    use HasFactory;


    protected $fillable=[
        "wormQuantity",
        "harvestCompostQuantity",
        "bin_id",
        "planting_id"
    ];

    public function bin()
    {
        return $this->belongsTo(Bin::class);
    }


    public function planting()
    {
        return $this->belongsTo(Planting::class);
    }

}
