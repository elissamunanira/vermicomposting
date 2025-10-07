<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Microcontroller extends Model
{
    use HasFactory;

    protected $fillable=[
                'name',
                'manufacturer',
                'architecture',
                'clock_speed',
                'flash_memory_size',
                'ram_size',
                'pin_count',
                'stock',
                'price',
                'cooperative_id',

    ];

    public function cooperative()
    {
        return $this->belongsTo(Cooperative::class);
    }
}
