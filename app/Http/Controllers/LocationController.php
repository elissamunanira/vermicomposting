<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User,District,Province,Sector, Location};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\Models\Cell;


class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $provinces = Province::all();
        $districts = District::all();

        return view('Dashboard.dropdown', compact('provinces', 'districts'));
    }


    public function getdistrict($provincecode){
        dd($provincecode);

        $districts = District::where('provincecode',$provincecode)->orderBy('namedistrict', 'ASC')->get();
        return json_encode($districts);

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Normal.location_profile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $formfields = $request->validate([

            'user_id'=>'required',
            'firstname'=>'required',
            'secondname'=>'required',
            'profilePic'=>'required|nullable',

            'phonenumber' => 'required|numeric|unique:locations,phonenumber',

            'gender'=>'required',

            'province'=>'required',
            'district'=>'required',
            'sector'=>'required',
            'cell'=>'required',


        ]);





        if($request->hasFile('profilePic')){
            $formfields['profilePic'] =$request->file('profilePic')->store('profiles', 'public');
        }

        $provincecode = $formfields['province'];

        // lookup province details
        $province_details = Province::find($provincecode);
        $province_name = $province_details->provincename;
        $formfields['province'] = $province_name;

        // lookup district details
        $districtcode = $formfields['district'];
        $district_details = District::where('provincecode', $provincecode)
            ->where('districtcode', $districtcode)
            ->first();
        $district_name = $district_details->namedistrict;
        $formfields['district'] = $district_name;

        // lookup sector details
        $sectorcode = $formfields['sector'];
        $sector_details = Sector::where('districtcode', $districtcode)
            ->where('sectorcode', $sectorcode)
            ->first();
        $sector_name = $sector_details->namesector;
        $formfields['sector'] = $sector_name;

        // lookup cell details
        $codecell = $formfields['cell'];
        $cell_details = Cell::where('sectorcode', $sectorcode)
            ->where('codecell', $codecell)
            ->first();
        $name_cell = $cell_details->nameCell;
        $formfields['cell'] = $name_cell;
        $formFields['user_id']=auth()->user()->id;

        
        Location::create($formfields);
        return redirect('/dashboard');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $auth_user=auth()->user()->id;
        $user = User::find($auth_user);
        $userLocation = $user->location();

        $user_profile = $user->location;

        // dd(  $user_profile);
        // if(auth()->user()->id=$user->user_id){
            return view('Dashboard.profile.show',['user_profile'=>$user_profile,'user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
