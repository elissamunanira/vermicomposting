<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMicrocontrollerRequest;
use App\Http\Requests\UpdateMicrocontrollerRequest;
use App\Models\Microcontroller;
use Illuminate\Support\Facades\DB;


class MicrocontrollerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth_user=auth()->user()->id;
        $cooperative_id = DB::table('cooperative_user')
        ->where('user_id',$auth_user)
        ->value('cooperative_id');
        $microcontrollers = DB::table('microcontrollers')
                      ->where('cooperative_id', $cooperative_id)
                      ->get();

        return view('microcontrollers.index',['microcontrollers'=>$microcontrollers])->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $auth_user=auth()->user()->id;
        $cooperative_id = DB::table('cooperative_user')
        ->where('user_id',$auth_user)
        ->value('cooperative_id');


        return view('microcontrollers.createmicro',[ 'cooperative_id'=>$cooperative_id ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMicrocontrollerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMicrocontrollerRequest $request)
    {



        $formfield = $request->validate([
                'name'=> 'required',
                'manufacturer'=>'required',
                'architecture' => 'required',
                'clock_speed'=>'required',
                'flash_memory_size'=>'required',
                'ram_size'=>'required',
                'pin_count'=>'required',
                'price'=>'required',
                'stock'=>'required',
                'cooperative_id'=>'required',


        ]);

        $existingMicrocontroller = Microcontroller::where('name', $formfield['name'])
        ->where('manufacturer', $formfield['manufacturer'])->where('architecture', $formfield['architecture'])->where('clock_speed', $formfield['clock_speed'])->where('flash_memory_size', $formfield['flash_memory_size'])->where('ram_size', $formfield['ram_size'])->where('pin_count', $formfield['pin_count'])->where('price', $formfield['price'])
        ->first();

    if ($existingMicrocontroller) {
        // A worm with the same name and price already exists,
        // so we need to increment its population
        $existingMicrocontroller->stock += $formfield['stock'];
        $existingMicrocontroller->save();
    } else {
        // No worm with the same name and price exists,
        // so we create a new one
        $newMicrocontroller = Microcontroller::create($formfield);
    }





        //$microcontroller =Microcontroller::create($formfields);

        return redirect('microcontrollers/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Microcontroller  $microcontroller
     * @return \Illuminate\Http\Response
     */
    public function show(Microcontroller $microcontroller)
    {

        return view('microcontrollers.show',['microcontroller'=>$microcontroller]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Microcontroller  $microcontroller
     * @return \Illuminate\Http\Response
     */
    public function edit(Microcontroller $microcontroller)
    {

        $auth_user=auth()->user()->id;
        $cooperative_id = DB::table('cooperative_user')
        ->where('user_id',$auth_user)
        ->value('cooperative_id');
        return view('microcontrollers.edit',['cooperative_id'=>$cooperative_id,'microcontroller'=>$microcontroller]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMicrocontrollerRequest  $request
     * @param  \App\Models\Microcontroller  $microcontroller
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMicrocontrollerRequest $request, Microcontroller $microcontroller)
    {

        $formfields = $request->validate([
                    'name'=> 'required',
                    'manufacturer'=>'required',
                    'architecture' => 'required',
                    'clock_speed'=>'required',
                    'flash_memory_size'=>'required',
                    'ram_size'=>'required',
                    'pin_count'=>'required',
                    'price'=>'required',
                    //'stock'=>'required',
                    'cooperative_id'=>'required',
                ]);


                $microcontroller->update($formfields);

                return redirect('microcontrollers/index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Microcontroller  $microcontroller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Microcontroller $microcontroller)
    {
        $microcontroller->delete();

        return redirect('/microcontrollers/index');
    }








}
