<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\LogActivity;
use Spatie\Activitylog\LogOptions;

class Cooperative extends Model
{
    use HasFactory, LogsActivity;

    protected static $logAttributes = ['name', 'email'];

    public function getActivitylogOptions(): LogOptions
    {
        $logOptions = new LogOptions();
        $logOptions->logName = 'user_activity';
        // Customize other options as per your requirements

        return $logOptions;
    }


    protected $fillable=[
                'co_operativename',
                'co_operativemanager',
                'co_operative_email',
                'co_operative_telephone',
                // 'status'=>'required',
                'starting_date',
                'province',
                'district',
                'sector',
                'cell',

    ];

    public function users(){
        return $this->belongsToMany(User::class);
    }



    public function members()
    {

           return $this->hasMany(Member::class, 'cooperative_id');

    }

    public function microcontrollers()
    {
        return $this->hasMany(Microcontroller::class);
    }

    public function bins()
    {
        return $this->hasMany(Bin::class);
    }


}
