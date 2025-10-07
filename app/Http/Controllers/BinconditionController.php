<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBinconditionRequest;
use App\Http\Requests\UpdateBinconditionRequest;
use Illuminate\Http\Request;
use App\Models\Bincondition;
use App\Models\Bin;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\BinConditionChanged;
use Illuminate\Support\Facades\DB;
use App\Models\Planting;



class BinconditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     //
    //     $bincondition = Bincondition::all();
    //     // return view('')->with('bincondition',$bincondition);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Bin $bin)
    {
        //


        return view('Normal.create_conditions')->with('bin',$bin);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBinconditionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBinconditionRequest $request, Bin $bin)
    {
       $formFields = $request->validate([

        'temperature' => 'required|numeric|between:15,25',
        'humidity' => 'required|numeric|between:70,90',
        'acidity' => 'required|numeric|between:6.0,7.5',
        'bin_id' => 'required',

       ]);

    //    $formFields['bin_id'] = $bin->id;

        Bincondition::create($formFields);
        return redirect('/bins');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bincondition  $bincondition
     * @return \Illuminate\Http\Response
     */
    public function show(Bin $bin)
    {


        $planting_id = DB::table('plantings')->where('bin_id',$bin->id)->latest('id')->value('id');

        $plantings = Planting::find($planting_id);

        $plantingstatus;
        if(isset($plantings->status)){


            $plantingstatus=$plantings->status;

        }

        else{
            $plantingstatus=1;
        }

        $i =1;

        $conditions=$bin->binconditions;

        $initialcompost= $bin->planting;

        $plantingsresults = DB::table('plantings')->where('bin_id',$bin->id)->where('status', 1)->get();
        $planting_ids = [];
        foreach ($plantingsresults as $plantingresult) {
            $planting_ids[] = $plantingresult->id;
        }

        $harvestingsresults = DB::table('harvestings')
            ->whereIn('planting_id', $planting_ids)
            ->get();

            //starting of chat function

            $binData = Bincondition::select('created_at', 'temperature', 'humidity', 'acidity','soil_moisture')->get();

        return view('Normal.singleBin',['bin'=>$bin,'conditions'=>$conditions,  'initialcompost'=>$initialcompost  ,'plantingstatus'=>$plantingstatus, 'plantingsresults'=>$plantingsresults, 'harvestingsresults'=>$harvestingsresults, 'i'=>$i,'binData'=>$binData]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bincondition  $bincondition
     * @return \Illuminate\Http\Response
     */
    public function edit(Bin $bin)
    {




         $conditions=$bin->binconditions;

        return view('Normal.update_condition',['bin'=>$bin,'conditions'=>$conditions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBinconditionRequest  $request
     * @param  \App\Models\Bincondition  $bincondition
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBinconditionRequest $request, Bin $bin,Bincondition $bincondition)
    {
        //


        $pre_conditions=$bin->binconditions;
        $formFields = $request->validate([
            'temperature' => 'required|numeric|between:5,225',
            'humidity' => 'required|numeric|between:10,190',
            'acidity' => 'required|numeric|between:0,14',
            'bin_id' => 'required',
        ]);

        $user = User::find(auth()->user()->id);
        $model = Bincondition::find($bincondition);
        $conditions = $bin->binconditions;
        $bin_number = $bin->code;
        $OG_temperature = $conditions->getOriginal('temperature');
        $OG_humidity = $conditions->getOriginal('humidity');
        $OG_acidity = $conditions->getOriginal('acidity');
        $old_conditions = array('acidity'=>$OG_acidity,'humidity'=>$OG_humidity ,'temperature'=>$OG_temperature, 'bin_number'=>$bin_number);
        $conditions->update($formFields);

        // Check if temperature, humidity, or acidity levels are outside the acceptable range
        if ($conditions->wasChanged(['temperature', 'humidity', 'acidity'])) {
            $notificationMessage = 'BinNumber ' . $bin_number . ' conditions have changed:';

            $newTemperature = $conditions->getAttribute('temperature');
            if ($newTemperature < 15 || $newTemperature > 25) {
                $notificationMessage .= ' Temperature is outside the acceptable range .';
            }

            $newHumidity = $conditions->getAttribute('humidity');
            if ($newHumidity < 70 || $newHumidity > 90) {
                $notificationMessage .= ' Humidity is outside the acceptable range.';
            }

            $newAcidity = $conditions->getAttribute('acidity');
            if ($newAcidity < 6.0 || $newAcidity > 7.5) {
                $notificationMessage .= ' Acidity is outside the acceptable range.';
            }

            Notification::send($user, new BinConditionChanged($conditions, $old_conditions, $bin, $notificationMessage));
        }


        // $formFields = $request->validate([

        //     'temperature' => 'required|numeric|between:15,25',
        //     'humidity' => 'required|numeric|between:70,90',
        //     'acidity' => 'required|numeric|between:6.0,7.5',
        //     'bin_id' => 'required',

        //    ]);
        //    $user= User::find(auth()->user()->id);
        //    $model = Bincondition::find($bincondition);

        //    $conditions=$bin->binconditions;


        //    $bin_number = $bin->code;
        //    $OG_temperature = $conditions->getOriginal('temperature');
        //    $OG_humidity = $conditions->getOriginal('humidity');
        //    $OG_acidity = $conditions->getOriginal('acidity');
        //    $old_conditions =array('acidity'=>$OG_acidity,'humidity'=>$OG_humidity ,'temperature'=>$OG_temperature, 'bin_number'=>$bin_number);


        //   $conditions->update($formFields);


        //   if ($conditions->isDirty()) {
        //     $conditions->update($formFields);
        //     Notification::send($user, new BinConditionChanged($conditions, $old_conditions, $bin));
        // }








            return redirect('/bins');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bincondition  $bincondition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bincondition $bincondition)
    {
        //
    }
}
