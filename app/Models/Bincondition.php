<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bincondition extends Model
{
    use HasFactory;
    protected $table = 'binconditions';

    protected $fillable=[
        'temperature',
        "humidity",
        "acidity",
        "bin_id"
    ];

    public function bin(){
        return $this->belongsTo(Bin::class, 'bin_id');
    }
   



}
