
   @extends('Dashboard/DashBoard')


   @section('content')
   
        {{-- <table>
            <tr>
                <td>number</td>
                <td>location</td>
            </tr>
            @foreach ($bin as $bin)
            <tr>
                <td>{{$bin->number}}</td>
                <td>{{$bin->location}}</td>
            
            </tr>
        @endforeach
    </table> --}}


    <table class="table">
        <thead class="thead-dark">
          <tr>
           
            <th scope="col">Username</th>
            <th scope="col">UserEmail</th>
            <th scope="col">Current Role</th>
            <th scope="col">Change Role</th>
           
          </tr>
        </thead>
        <tbody>
          
          {{-- @if(!Auth::guest())  
          @if(Auth::user()->id==$bin->user_id) --}}
        @foreach ($users as $user)
          <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->getRoleNames()}}</td>
          
            <td>

              <form class="form-inline" method="POST" action="/changeRole">
                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">New Role</label>
                <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                  <option selected>Choose...</option>
                  <option value="1">Admin</option>
                  <option value="1">vermiculturist</option>
                </select>
              
                <button type="submit" class="btn btn-primary my-1">Change</button>
              </form>


            </td>

          </tr>
        @endforeach
         
       
        </tbody>
      </table>
      
  
     
      </table>
    {{-- @endif
    @endif   --}}
    @endsection('content')


