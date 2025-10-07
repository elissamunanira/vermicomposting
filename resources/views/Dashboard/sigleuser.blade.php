

    @extends('Dashboard/DashBoard')


    @section('content')
    <div ></div>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" >
     <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
       <h1 class="h2">Dashboard</h1>
       <div class="btn-toolbar mb-2 mb-md-0">
         <div class="btn-group me-2">
           <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
           <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
         </div>
         <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
           <span data-feather="calendar" class="align-text-bottom"></span>
           This week
         </button>
       </div>
     </div>
 
 
  
     <table class="table">
      <thead class="thead-dark">
        <tr>
         
        
        
          <th scope="col">email</th>
          <th scope="col">username</th>
          <th scope="col">email</th>
          <th scope="col">roles</th>
        
          
         
        </tr>
      </thead>
      <tbody>
        
        {{-- @if(!Auth::guest())  
        @if(Auth::user()->id==$bin->user_id) --}}
      
        <tr>
          <td>{{$user->name}}</td>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td>{{$user->getRoleNames()}}</td>
  
        </tr>
    
       
     
      </tbody>
    </table>
    <div style="margin-left:270px">
    <form action="{{ url('/manage/role/permissions/'.$user->id) }}" method="POST">
      {{csrf_field()}}
      @method('PATCH')
  @forEach($opermissions as $permission)
  <input type="checkbox" value="{{$permission->name}}" name="permission {{$loop->iteration}}">  &nbsp;{{$permission->name}}<br/>
   @endforeach
   <button type="submit" class="btn btn-primary">Revoke</button>
    </table>
  </div>
  @endsection('content')
    
 
 
         
 
 
 
    
      
  
     




