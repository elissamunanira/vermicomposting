<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Province;
use App\Models\District;
use App\Models\Sector;
use App\Models\Cell;
use App\Models\Village;
use App\Models\Bin;
use App\Models\Cooperative;
use App\Models\User;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Cooperative $cooperative ,User $user, Member $menber)
    {
        $auth_user=auth()->user()->id;
        $cooperative_id = DB::table('cooperative_user')
                         ->where('user_id',$auth_user)
                         ->value('cooperative_id');
        $cooperativeInfo=Cooperative::find($cooperative_id);








        $Members=Member::where('cooperative_id',$cooperative_id)->get();
        return view('Cooperative.show',['cooperativeInfo'=>$cooperativeInfo, 'Members'=>$Members])->with('i');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('Cooperative.comember_create');
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
            'firstname'=>'required',
            'secondname'=>'required',
            'phonenumber'=>'required',
            'gender'=>'required',
            'age'=>'required',
            'email'=>'required',
            'province'=>'required',
            'district'=>'required',
            'sector'=>'required',
            'cell'=>'required',


        ]);
        $provincecode=$formfields['province'];

        $province_details = Province::find($provincecode);
        $province_name=$province_details->provincename;
        $formfields['province']=$province_name;

        $districtcode=$formfields['district'];

        $district_details= District::where('provincecode', $provincecode)
        ->where('districtcode', $districtcode)
        ->first();
        $district_name =$district_details->namedistrict;
        $formfields['district']= $district_name;



        $sectorcode = $formfields['sector'];
        $sector_details = Sector::where('districtcode', $districtcode)->where('sectorcode', $sectorcode)
        ->first();

        $sector_name =$sector_details->namesector;
        $formfields['sector']=  $sector_name;


        $codecell = $formfields['cell'];
        $cell_details = Cell::where('sectorcode', $sectorcode)->where('codecell', $codecell)
        ->first();
        $name_cell =   $cell_details->nameCell;
        $formfields['cell']=$name_cell;



        $auth_user=auth()->user()->id;
        $cooperative_id = DB::table('cooperative_user')
                         ->where('user_id',$auth_user)
                         ->value('cooperative_id');

        $formfields['cooperative_id']= $cooperative_id;
        // $dateString = $formfields['age'];
        // $dateTimestamp = strtotime($dateString);
        // $currentTimestamp = time();
        // $yearDifference = date('Y', $currentTimestamp) - date('Y', $dateTimestamp);
        // $formfields['age']=$yearDifference;


        Member::create($formfields);



        return redirect('/cooperatives/show')->with('success', 'member Cooperative Created success full');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {

        // dd($member);
      $bins =DB::table('bins')->where('member_id',$member->id)->latest('id')->get();


        return view('Cooperative.member',['member'=>$member,  'bins'=>$bins])->with('i');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {


        $provinces = Province::all();





        return view('Cooperative.update', ['member'=>$member,'provinces'=>$provinces]);
    }

    public function getDistricts(Request $request)
    {
        $districts=District::where('provincecode',$request->provincecode)->get();
        return response()->json($districts);
    }

    public function getSectors(Request $request){
        $sectors=Sector::where('districtcode',$request->districtcode)->get();
        return response()->json($sectors);
    }

    public function getCells(Request $request){
        $cells=Cell::where('sectorcode',$request->sectorcode)->get();
        return response()->json($cells);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $formfields = $request->validate(
            [
                'firstname'=>'required',
                'secondname'=>'required',
                'phonenumber'=>'required',
                'email'=>'required',
                'province'=>'required',
                'district'=>'required',
                'sector'=>'required',
                'cell'=>'required',
            ]


            );



            $provincecode = $formfields['province'];

            $province_details = Province::find($provincecode);
            $province_name  =  $province_details->provincename;
            $formfields['province']   =  $province_name;

            $districtcode   =   $formfields['district'];

            $district_details= District::where('provincecode', $provincecode)
            ->where('districtcode', $districtcode)
            ->first();
            $district_name =$district_details->namedistrict;
            $formfields['district']= $district_name;



            $sectorcode = $formfields['sector'];
            $sector_details = Sector::where('districtcode', $districtcode)->where('sectorcode', $sectorcode)
            ->first();

            $sector_name =$sector_details->namesector;
            $formfields['sector']=  $sector_name;


            $codecell = $formfields['cell'];
            $cell_details = Cell::where('sectorcode', $sectorcode)->where('codecell', $codecell)
            ->first();
            $name_cell =   $cell_details->nameCell;
            $formfields['cell']=$name_cell;

            $member->update($formfields);

            return redirect('/cooperatives/show');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {


        $member->delete();
        return redirect('/cooperatives/show')->with('success', 'Cooperative  member  Deleted success full');;


    }
}
