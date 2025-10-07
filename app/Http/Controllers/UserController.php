<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Auth\RequestGuard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Mail;
use Notification;
use App\Notifications\Vermicomposting;
use CanResetPassword;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use DB;
use Illuminate\Support\Arr;
use Carbon\Carbon;



class UserController extends Controller
{

// displaying all users in admin dashboard
public function index()
{
    if(auth()->user()->can('view-users-admin')){
        $users =User::all();
        $count = collect($users)->count();
        return view('Dashboard.users1',compact('users'))->with('i');
    }
}

//Creating Role through admin dashboard

public function create_Admin_User(Request $request, User $user){
    $roles = Role::pluck('name','name')->all();
    $userRole = $user->roles->pluck('name','name')->all();
    return view('Dashboard.Adimn_create_User',['roles'=>$roles,'userRole'=>$userRole]);
}


// Assigning Role to user

public function create()
{
    $roles = Role::pluck('name','name')->all();
    return view('users.create',compact('roles'));
}

//Createing New user in Admin dashboard

public function store(Request $request)
{
    $this->validate($request,
    [
        'name'  => ['required','min:3'],
        'email'     => 'required|unique:users,email',
        'password'  => 'required|confirmed',
        'roles' => 'required'
    ],

    [
        'name.required'=>'Name is required',
        'email.required'=>'email is required',
        'password.required'=>'password is required',
    ]
                    );

    $user=new User;
    $user->name=$request->name;
    $user->email=$request->email;
    $user->password=Hash::make($request->password);
    $user->Roles=implode(', ',$request->roles);
    if($user->save()){
        $user->assignRole($request->input('roles'));
                    }

    return redirect('/vermusers')->with('success','user Created success full');
}


 /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::find($id);
    }


    public function showadmin($id)
    {
        //

        $user= User::find($id);


    }

// Edit user in Admin Dashboard

    public function edit(User $user)
    {
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('Dashboard.edit_user',['user'=>$user,'roles'=>$roles,'userRole'=>$userRole]);
    }

    public function update(Request $request, $id)
    {


        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,

            'roles' => 'required'
        ]);
        $input = User::find($id);
        $input->name=$request->input('name');
        $input->email=$request->input('email');
        $input->Roles=implode(', ',$request->roles);;

        if($input->update()){
            DB::table('model_has_roles')->where('model_id',$id)->delete();
            $input->assignRole($input->Roles);

        }
        return redirect('/vermusers')->with('success','User updated successfully');
    }
//Deleting user

    public function destroy($id)
    {

        User::destroy($id);
        return redirect('/vermusers');
    }



//Registering new user
public function register(Request $request){

    $formFields = $request->validate([

        'name'  => ['required','min:3'],
        'email'     => 'required|unique:users,email',
        'password'  => 'required|confirmed',
    ]);

    // this create user
    // $formFields['password']=bcrypt($formFields['password']);
    $formFields['password'] = Hash::make($request->password);

    $user = User::create($formFields);

    // user taking key token
    $token = $user->createToken('myapptoken')->plainTextToken;

    // user information in response
    $response = [
        'user'=>$user,
        'token'=>$token
    ];
    $user->notify(new Vermicomposting($user));
    return redirect('/login');

}

//Login
public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);
    if (Auth::attempt($credentials)){

        $request->session()->regenerate();
            return redirect()->intended('/dashboard');
    }
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');

}

//Logout
public function logout(Request $request){
    session_start();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    session_destroy();
return redirect('/');
}



//Users status update being enabled or desabled

public function updateStatus($user_id,$status_code){
    try{
        $update_user = User::whereId($user_id)->update(['status'=>$status_code]);
        if($update_user){
            return redirect('/vermusers')->with('success','User Updated success full');
        }
        return redirect('/vermusers')->with('error','failed to  Updated the status');

    }
    catch(\Throwable $th){
        throw $th;
    }

        $user = User::find($user_id);
        $activityLogs = $user->activityLogs;
}


//reseting pass word
public function forgetPassword( )
{
    return view('Auth.getmailform');

}

public function forgetPasswordPost(Request $request)

{
    // Validate the request data
    $request->validate([

        'email' => 'required|email|exists:users',

    ]);

    $token = Str::random(length:64);
    DB::table(table:'password_resets')->insert([
        'email'=> $request->email,
        'token'=> $token,
        'created_at' => carbon::now()
    ]);
    Mail::send('Auth.verify', ['token' => $token], function($message) use ($request) {
        $message->to($request->email);
        $message->subject("Reset Password");
    });

        return redirect('/login')->with("success","we have send any email to reset password");

 }

 public function resetPassword( $token)
 {
        return view('Auth.new_password',compact(var_name:'token'));
 }

 public function resetPasswordPost(Request $request)
 {
          $request->validate(
            [
                "email" => "required|email|exists:users",
                "password" => "required|string|min:6|confirmed",
                "password_confirmation" => "required",

            ]
          );

          $updatePassword = DB::table(table:'password_resets')->where(["email"=>$request->email,
            "token" => $request -> token
        ])->first();

        if(!$updatePassword){
                return redirect()-> to(route('/reset_password_post'));
        }

        User::where('email', $request->email)->update(["password"=>Hash::make($request->password)]);


        DB::table('password_resets')->where('email', $request->email)->delete();


        return redirect('/login')->with('success', 'password reset success');
 }



}


