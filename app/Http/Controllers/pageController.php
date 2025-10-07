<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bin;
use App\Models\User;
use App\Models\Bincondition;
use App\Models\Location;
use App\Models\Member;
use App\Models\Cooperative;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class pageController extends Controller

{




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     // default page
    public function index()
    {
        //

        return view('Normal.main-layout');
    }


//dashboard page
    public function dashbord(User $user)
    {   $user = auth()->user();
        $users =User::all();
        $inactive_users = User::where('status',0)->count();
        $female_users = Location::where('gender','female')->count();
        $male_users = Location::where('gender','male')->count();
        $managers = User::where('Roles','Manager')->count();
        $active_managers = User::where('Roles','Manager')->where('status',1)->count();
        $inactive_managers = User::where('Roles','Manager')->where('status',0)->count();

        //cooperatives locations

        $north_cooperatives = Cooperative::where('province','North Provice')->count();
        $sourth_cooperatives = Cooperative::where('province','South Provice')->count();
        $east_cooperatives = Cooperative::where('province','East Provice')->count();
        $west_cooperatives = Cooperative::where('province','Wester Provice')->count();
        $kigali_cooperatives = Cooperative::where('province','Kigali City')->count();
       

        


      
        $count = collect($users)->count();
        $bins =Bin::all();
        $bins_number = collect($bins)->count();

        $inactive_accounts = User::where('status',0)->count();
        $active_accounts = User::where('status',1)->count();

        $locations = Location::where('user_id', auth()->user()->id)->get();
        $all_cooperatives = Cooperative::all()->count();
        $active_cooperatives = Cooperative::where('status',1)->count();
        $inactive_cooperatives = Cooperative::where('status',0)->count();



        $auth_user=auth()->user()->id;
        $cooperative_id = DB::table('cooperative_user')
                         ->where('user_id',$auth_user)
                         ->value('cooperative_id');
         $status = 0;
         $verm_proccess= DB::table('plantings')
                         ->where('status',$status)
                         ->count();



        $statuss = 1;
        $no_verm_procces= DB::table('plantings')
                         ->where('status', $statuss )
                         ->count();



                      //dd(   $no_verm_procces);

        $cooperativeInfo=Cooperative::find($cooperative_id);

        $total_bins = Bin::where('cooperative_id', $cooperative_id)->count();
        $total_members = Member::where('cooperative_id', $cooperative_id)->count();


        $active_bins = DB::table('bins')->where('cooperative_id', $cooperative_id)->where('status','1')->count();


        $inactive_bins = DB::table('bins')->where('cooperative_id', $cooperative_id)->where('status','0')->count();








        $currentMonth = date('m');
        $currentYear = date('Y');



        $previousMonth = $currentMonth - 1;
      $previousYear = $currentYear;

      $previous_month_member = DB::table('members')
      ->where('cooperative_id',$cooperative_id)
      ->select('id', DB::raw('COUNT(*) as previous_month_total'))
      ->whereMonth('created_at', $previousMonth)
      ->whereYear('created_at', $currentYear)
      ->groupBy('id')
      ->count();

      $current_month_member = DB::table('members')
      ->where('cooperative_id',$cooperative_id)
      ->select('id', DB::raw('COUNT(*) as previous_month_total'))
      ->whereMonth('created_at',$currentMonth)
      ->whereYear('created_at', $currentYear)
      ->groupBy('id')
      ->count();


      $microcontrollers = DB::table('microcontrollers')->where('cooperative_id',$cooperative_id)->count();

      $wormsByMonth = DB::table('worms')
    ->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as count'))
    ->where('cooperative_id', $cooperative_id)
    ->groupBy('month')
    ->orderBy('month')
    ->get();

    $previousCount = 0;
    foreach ($wormsByMonth as $key => $worms) {
        $currentCount = $worms->count;
        if ($key > 0) {
            $percentageIncrease = (($currentCount - $previousCount) / $previousCount) * 100;
            $wormsByMonth[$key]->percentageIncrease = round($percentageIncrease, 2);
        } else {
            $wormsByMonth[$key]->percentageIncrease = 0;
        }
        $previousCount = $currentCount;
    }

    $male = 'male';
    $female = 'female';

    // Get count of worms
    $worm = DB::table('worms')->where('cooperative_id', $cooperative_id)->count();

    // Get male member counts by month
    $males = DB::table('members')->where('cooperative_id', $cooperative_id)
        ->where('gender', $male)
        ->get()
        ->groupBy(function($created_at) {
            return Carbon::parse($created_at->created_at)->format('Y-M');
        });

    $months = [];
    $monthCount = [];

    foreach ($males as $month => $monthValues) {
        $months[] = $month;
        $monthCount[] = count($monthValues);
    }

    // Get female member counts by month
    $females = DB::table('members')->where('cooperative_id', $cooperative_id)
        ->where('gender', $female)
        ->get()
        ->groupBy(function($created_at) {
            return Carbon::parse($created_at->created_at)->format('Y-M');
        });

    $monthsf = [];
    $monthCountf = [];

    foreach ($females as $month => $monthValues) {
        $monthsf[] = $month;
        $monthCountf[] = count($monthValues);
    }



    $cooperative_members = Member::where('cooperative_id', $cooperative_id)->get();
    $Age = [];

    foreach ($cooperative_members as $member) {
        $dateOfBirth = Carbon::parse($member->age);
        $years = $dateOfBirth->diffInYears(Carbon::now());
        $Age[] = $years;
    }




    $worms = DB::table('worms')->where('cooperative_id', $cooperative_id)->get()->groupBy(function($created_at) {
        return Carbon::parse($created_at->created_at)->format('Y-M');
    });



            $data = [];

            foreach ($worms as $montha => $monthWormsa) {
                $population = count($monthWormsa);
                $data[] = [
                    'x' => $montha,
                    'y' => $population
                ];
            }





            $farmers = null;
            $cooperativebins = null;
            $cooperative_number = null;
            $active_cooperative_number = null;
            $inactive_cooperative_number= null;
        $userLocation = auth()->user()->location;
        $cooperatives = null; // declare and initialize the variable
        $auth_user_id = auth()->user()->id;
        $auth_user_role = DB::table('users')->where('id',$auth_user_id)->value('Roles');

        foreach($locations as $location)
        {



            if ($location) {

        if(auth()->user()->roles){
            foreach(auth()->user()->roles as $role){
                if($role->name == 'Admin'){

                    $cooperatives = Cooperative::all();

                }

                else if($role->name == 'Sedo'){
                    $cooperatives = Cooperative::where('cell', $userLocation->cell)->get();

                    $cooperativebins =Db::table('bins')->where('cell', $userLocation->cell)->count();
                    $cooperativebinsget =Db::table('bins')->where('cell', $userLocation->cell)->get();

                    $farmers =Db::table('members')->where('cell', $userLocation->cell)->count();



                    $active_cooperative_number = Cooperative::where('cell', $userLocation->cell)->where('status', $status)->count();

                    $inactive_cooperative_number = Cooperative::where('cell', $userLocation->cell)->where('status', $statuss)->count();

                   // dd($inactive_cooperative_number);
                    $cooperative_number = Cooperative::where('cell', $userLocation->cell)->count();

                }

                else if($role->name == 'SectorAgronomy'){
                    $cooperatives = Cooperative::where('sector', $userLocation->sector)->get();

                    $cooperativebins =Db::table('bins')->where('sector', $userLocation->sector)->count();
                    $cooperativebinsget =Db::table('bins')->where('sector', $userLocation->sector)->get();

                    $farmers =Db::table('members')->where('sector', $userLocation->sector)->count();



                    $active_cooperative_number = Cooperative::where('sector', $userLocation->sector)->where('status', $status)->count();

                    $inactive_cooperative_number = Cooperative::where('sector', $userLocation->sector)->where('status', $statuss)->count();

                   // dd($inactive_cooperative_number);
                    $cooperative_number = Cooperative::where('sector', $userLocation->sector)->count();
                    

                }

                else if($role->name == 'DistrictAgronomy'){
                    $cooperatives = Cooperative::where('district', $userLocation->district)->get();

                    $cooperativebins =Db::table('bins')->where('district', $userLocation->district)->count();
                    $cooperativebinsget =Db::table('bins')->where('district', $userLocation->district)->get();

                    $farmers =Db::table('members')->where('district', $userLocation->district)->count();



                    $active_cooperative_number = Cooperative::where('district', $userLocation->district)->where('status', $status)->count();

                    $inactive_cooperative_number = Cooperative::where('district', $userLocation->district)->where('status', $statuss)->count();

                   // dd($inactive_cooperative_number);
                    $cooperative_number = Cooperative::where('district', $userLocation->district)->count();

                }

                else if($role->name == 'ProvinceAgronomy'){


                    $cooperatives = Cooperative::where('province', $userLocation->province)->get();

                   // dd($cooperatives);

                    $cooperativebins =Db::table('bins')->where('province', $userLocation->province)->count();
                    $cooperativebinsget =Db::table('bins')->where('province', $userLocation->province)->get();

                    $farmers =Db::table('members')->where('province', $userLocation->province)->count();



                    $active_cooperative_number = Cooperative::where('province', $userLocation->province)->where('status', $status)->count();

                    $inactive_cooperative_number = Cooperative::where('province', $userLocation->province)->where('status', $statuss)->count();

                   // dd($inactive_cooperative_number);
                    $cooperative_number = Cooperative::where('province', $userLocation->province)->count();

                }

                else if($role->name == 'RAB'){
                    $cooperatives = Cooperative::where('cell', $userLocation->cell)->get();

                    $cooperativebins =Db::table('bins')->where('cell', $userLocation->cell)->count();
                    $cooperativebinsget =Db::table('bins')->where('cell', $userLocation->cell)->get();

                    $farmers =Db::table('members')->where('cell', $userLocation->cell)->count();



                    $active_cooperative_number = Cooperative::where('cell', $userLocation->cell)->where('status', $status)->count();

                    $inactive_cooperative_number = Cooperative::where('cell', $userLocation->cell)->where('status', $statuss)->count();

                   // dd($inactive_cooperative_number);
                    $cooperative_number = Cooperative::where('cell', $userLocation->cell)->count();

                }

                else if($role->name == 'NAEB'){
                    $cooperatives = Cooperative::where('cell', $userLocation->cell)->get();

                    $cooperativebins =Bin::all()->count();
                    $cooperativebinsget =Db::table('bins')->where('cell', $userLocation->cell)->get();

                    $farmers =Member::all()->count();



                    $active_cooperative_number = Cooperative::where('status', $status)->count();

                    $inactive_cooperative_number = Cooperative::where('status', $statuss)->count();

                   // dd($inactive_cooperative_number);
                    $cooperative_number = Cooperative::all()->count();

                }










        }


        }


  

        $users = User::all();



























        
       

                return view('Dashboard.adminlanding',['user'=>$user,'count'=>$count,
                'active_cooperatives'=>$active_cooperatives,
                'inactive_cooperatives'=>$inactive_cooperatives,
                'bins_number'=>$bins_number,'active_accounts'=>$active_accounts,'inactive_accounts'=>$inactive_accounts, 'cooperativeInfo'=>$cooperativeInfo, 'total_bins'=>$total_bins, 'total_members'=>$total_members,'verm_proccess'=>   $verm_proccess,
                'no_verm_procces'=>$no_verm_procces, 'worm' =>$worm,'microcontrollers'=>$microcontrollers,    'wormsByMonth'=>$wormsByMonth, 'monthCount'=>$monthCount, 'months'=>$months, 'males'=> $males, 'monthsf'=>$monthsf, 'monthCountf'=>$monthCountf, 'females'=>$females,'Age'=>$Age,'active_bins'=>$active_bins,'inactive_bins'=>$inactive_bins,'data' =>$data, 'worms'=>$worms,  'auth_user_role'=> $auth_user_role,  'cooperative_number'=>  $cooperative_number,
                'active_cooperative_number'=> $active_cooperative_number, 'inactive_cooperative_number'=> $inactive_cooperative_number, 'cooperativebins'=> $cooperativebins,'farmers'=>  $farmers,
                'all_cooperatives'=>$all_cooperatives,
                'managers'=>$managers,
                'active_managers'=>$active_managers,
                "inactive_managers"=>$inactive_managers,
                "inactive_users"=> $inactive_users,
                'female_users'=>$female_users,
                'male_users'=>$male_users,
                'north_cooperatives'=> $north_cooperatives,
                'sourth_cooperatives' => $sourth_cooperatives,
                'east_cooperatives' => $east_cooperatives,
                'west_cooperatives' => $west_cooperatives,
                'kigali_cooperatives' =>$kigali_cooperatives
            ]);



        }



                 }


                 return redirect('/location');


    }


//active manager
public function managers(){
    $i=1;
    $managers = User::where('Roles','Manager')->get();
   
    $active_managers = User::where('Roles','Manager')->where('status',1)->get();
    $inactive_managers = User::where('Roles','Manager')->where('status',0)->get();
    return view('Admin_landingpage.active_managers',['managers'=>$managers,'i'=>$i]);
    
}
//managers

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//return bins in admin dashboard
    public function InvalidError(Request $request, User $user)
    {

        return view('Dashboard.erro403')->with('user',$user);
    }


    public function InvalidCooperativeError(Request $request, User $user)
    {

        return view('Dashboard.erro403cooperative')->with('user',$user);
    }








    public function databaseNoIndex(){




        // $notifications = auth()->user()->Notifications->orderBy('created_at', 'desc')->get();

        $notifications = auth()->user()->notifications()
    ->orderBy('created_at', 'desc')
    ->get();
        $acceptable_temperatures = ['min' => 15, 'max' => 25];
        $acceptable_acidity = ['min' => 6, 'max' => 7.5];
        $acceptable_humidity = ['min' => 60, 'max' => 70];

        $out_of_range_conditions = [];
        foreach ($notifications as $notification) {
            // Check temperature
            if ($notification->data['pre_temperature'] !== $notification->data['temperature']) {
                if ($notification->data['temperature'] < $acceptable_temperatures['min'] || $notification->data['temperature'] > $acceptable_temperatures['max']) {
                    $out_of_range_conditions[] = 'Temperature in bin ' . $notification->data['bin_number'] . ' is out of range';
                }
            }


             // Check acidity
             if ($notification->data['pre_acidity'] !== $notification->data['acidity']) {
                if ($notification->data['acidity'] < $acceptable_acidity['min'] || $notification->data['acidity'] > $acceptable_acidity['max']) {
                    $out_of_range_conditions[] = 'Acidity in bin ' . $notification->data['bin_number'] . ' is out of range';
                }
            }

            // Check humidity
            if ($notification->data['pre_humidity'] !== $notification->data['humidity']) {
                if ($notification->data['humidity'] < $acceptable_humidity['min'] || $notification->data['humidity'] > $acceptable_humidity['max']) {
                    $out_of_range_conditions[] = 'Humidity in bin ' . $notification->data['bin_number'] . ' is out of range';
                }
            }
        }

        return view('notify.database_condition',  [
            'notifications' => $notifications,
            'acceptable_temperatures' => $acceptable_temperatures,
            'acceptable_acidity' => $acceptable_acidity,
            'acceptable_humidity' => $acceptable_humidity,
            'out_of_range_conditions' => $out_of_range_conditions,
        ]);
    }


    public function markAsRead(){
        Auth::user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }
    // public function markNotification(Request $request)
    // {
    //     auth()->user()
    //         ->Notifications
    //         ->when($request->input('id'), function ($query) use ($request) {
    //             return $query->where('id', $request->input('id'));
    //         })
    //         ->markAsRead();

    //     return response()->noContent();
    // }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
