<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBinRequest;
use App\Http\Requests\UpdateBinRequest;
use App\Models\Bin;
use App\Models\Worm;
use App\Models\Bincondition;
use App\Models\Province;
use App\Models\District;
use App\Models\Sector;
use App\Models\Cell;
use App\Models\Village;
use App\Models\Member;
use App\Models\Planting;
use App\Models\Cooperative;
use App\Models\Microcontroller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



class BinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Bin $bin)
    {

        $auth_user=auth()->user()->id;
        $cooperative_id = DB::table('cooperative_user')
                         ->where('user_id',$auth_user)
                         ->value('cooperative_id');

        $bins = Bin::all()->where('cooperative_id', $cooperative_id);
// dd($bins);
        // $member_bins = DB::table('bins')
        // ->where('member_id',$member_id)
        // ->value('cooperative_id');
        $cooperativeInfo=Cooperative::find($cooperative_id);
        // $members=$cooperativeInfo->members;
        // $bins=[];
        // foreach($members as $member){
        //     $bin = $member->bin;

        // }



        return view('Normal.bins1',['bins'=>$bins])->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Member $member)
    {


        $member=$member->id;

        $auth_user=auth()->user()->id;
        $cooperative_id = DB::table('cooperative_user')
                         ->where('user_id',$auth_user)
                         ->value('cooperative_id');
        $cooperativeInfo=Cooperative::find($cooperative_id);
        $microcontrollers=Microcontroller::where('cooperative_id',$cooperative_id)->get();
        $worms=Worm::where('cooperative_id',$cooperative_id)->get();









        $cooperativeMembers=Member::where('cooperative_id',$cooperative_id)->get();

        


        return view('Normal.create_bin1',['member'=>$member,'cooperative_id'=>$cooperative_id,'microcontrollers'=>$microcontrollers,'worms'=>$worms]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBinRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Member $member)
    {
        $formfields = $request->validate([
            'microcontroller_type' => 'required',
            'worm_type' => 'required',
            'province' => 'required',
            'district' => 'required',
            'sector' => 'required',
            'cell' => 'required',
            'member_id' => 'required',
            'cooperative_id' => 'required',
        ]);

        $auth_user = auth()->user()->id;
        $cooperative_id = DB::table('cooperative_user')
            ->where('user_id', $auth_user)
            ->value('cooperative_id');
        $cooperativeInfo = Cooperative::find($cooperative_id);
        $cooperativeName = $cooperativeInfo->co_operativename;
        $year = date('Y'); // current year
        $date = date('md'); // current date (month and day)

        // get the last Bin record and increment its code
        $lastBin = Bin::orderBy('created_at', 'desc')->first();
        $lastCode = $lastBin ? $lastBin->code : '000'; // use '000' if no previous record exists
        $nextCode = str_pad((int) $lastCode + 1, 3, '0', STR_PAD_LEFT);
        $code = $nextCode . '-' . $cooperativeName . '-BIN-' . $year . '-' . $date;


        $formfields['code'] = $code;
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


        $bin = Bin::create($formfields);

        return redirect('/bins');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bin  $bin
     * @return \Illuminate\Http\Response
     */
    public function show(Bin $id)
    {
        //$bin = Bin::find($id);

        $dd($bin);

        return view('Normal.singleBin',['bin'=>$bin]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bin  $bin
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Bin $bin,Member $member)
    {



        $member=$member->id;
       // dd($member);

        $auth_user=auth()->user()->id;
        $cooperative_id = DB::table('cooperative_user')
                         ->where('user_id',$auth_user)
                         ->value('cooperative_id');
                        // dd( $cooperative_id);

        $provinces = Province::all();

        $microcontrollers=Microcontroller::where('cooperative_id',$cooperative_id)->get();
        $worms=Worm::where('cooperative_id',$cooperative_id)->get();

        //return view('Cooperative.update', ['member'=>$member]);

        return view('Normal.edit_bin',['bin'=>$bin,'member'=>$member,'cooperative_id'=>$cooperative_id,'provinces'=>$provinces,'microcontrollers'=>$microcontrollers,'worms'=>$worms]);

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
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Bin  $bin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bin $bin)
    {



        $formfields=$request->validate(
            [
                'microcontroller_type'=>'required',
                'worm_type' => 'required',
                'province'=>'required',
                'district'=>'required',
                'sector'=>'required',
                'cell'=>'required',
                'member_id'=>'required',
                'cooperative_id'=>'required',
            ]
             );





        $bin->update($formfields);




       return redirect('/bins');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bin  $bin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        // if(auth()->user()->hasRole('Admin')){

        Bin::destroy($id);
        return redirect('/bins');
    // } else{
    //     echo"you are not authorised";
    // }



    }



    public function updateStatus(Bin $bin, $status_code){
        try{


            $update_bin = $bin->update(['status'=>$status_code]);


            if($update_bin){
                return redirect('/bins')->with('success','User Updated successfully');
            }

            return redirect('/bins')->with('error','Failed to update the status');

        } catch(\Throwable $th){
             throw $th;
        }
    }









}
