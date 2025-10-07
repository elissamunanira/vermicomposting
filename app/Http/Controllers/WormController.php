<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWormRequest;
use App\Http\Requests\UpdateWormRequest;
use App\Models\Worm;
use Illuminate\Support\Facades\DB;


class WormController extends Controller
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
        $worms = DB::table('worms')
                      ->where('cooperative_id', $cooperative_id)
                      ->get();

        return view('worms.index',['worms'=>$worms])->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $auth_user=auth()->user()->id;
        $cooperative_id = DB::table('cooperative_user')
        ->where('user_id',$auth_user)
        ->value('cooperative_id');

        return view('worms.create',[ 'cooperative_id'=>$cooperative_id ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWormRequest $request)
    {
            $formfield = $request->validate(
                [
                    'name' => 'required',
                    'price' => 'required',
                    'population' => 'required',
                    'description' => 'nullable',
                    'cooperative_id' => 'required',



                ]
                );

                $existingWorm = Worm::where('name', $formfield['name'])
                ->where('price', $formfield['price'])
                ->first();

            if ($existingWorm) {
                // A worm with the same name and price already exists,
                // so we need to increment its population
                $existingWorm->population += $formfield['population'];
                $existingWorm->save();
            } else {
                // No worm with the same name and price exists,
                // so we create a new one
                $newWorm = Worm::create($formfield);
            }





                return redirect('/worms/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Worm  $worm
     * @return \Illuminate\Http\Response
     */
    public function show(Worm $worm)
    {
        return view('worms.show',['worm'=>$worm]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Worm  $worm
     * @return \Illuminate\Http\Response
     */
    public function edit(Worm $worm)
    {
        $auth_user=auth()->user()->id;
        $cooperative_id = DB::table('cooperative_user')
        ->where('user_id',$auth_user)
        ->value('cooperative_id');
        return view('worms.edit',['cooperative_id'=>$cooperative_id,'worm'=>$worm]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWormRequest  $request
     * @param  \App\Models\Worm  $worm
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWormRequest $request, Worm $worm)
    {
                $formfield = $request->filled('description')
                ? $request->validate([
                    'name' => 'required',
                    'price' => 'required',
                    'population' => 'required',
                    'description' => 'nullable',
                    'cooperative_id' => 'required',
                ])
                : $request->validate([
                    'name' => 'required',
                    'price' => 'required',
                    'population' => 'required',
                    'cooperative_id' => 'required',
                ]);

                $existingWorm = Worm::where('name', $formfield['name'])
                    ->where('price', $formfield['price'])
                    ->where('id', '!=', $worm->id)
                    ->first();

                if ($existingWorm) {
                    // A worm with the same name and price already exists,
                    // so we need to increment its population and delete the current worm
                    $existingWorm->population += $formfield['population'];
                    $existingWorm->save();

                    $worm->delete();
                } else {
                    // No worm with the same name and price exists,
                    // so we update the current worm
                    $worm->update($formfield);
                }

                return redirect('/worms/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Worm  $worm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Worm $worm)
    {

        $worm->delete();
        return redirect('/worms/index');
    }
}
