@extends('Dashboard/DashBoard')
@section('content')



   @csrf
   @foreach ($bin as $bin)
   <div class="list-group">
   <h3><a href="#" class="list-group-item">Dedtails For BinNumber: {{$bin->number}}</a></h3>

    <a href="#" class="list-group-item list-group-item-action">binNumber: {{$bin->number}}</a>
    <a href="#" class="list-group-item list-group-item-action">microcontroller_type: {{$bin->microcontroller_type}}</a>
    <a href="#" class="list-group-item list-group-item-action disabled">location: {{$bin->location}}</a>
    <a href="#" class="list-group-item list-group-item-action">Bin_created_at: {{$bin->created_at}}</a>
    <a href="#" class="list-group-item list-group-item-action disabled">Bin_updated_at: {{$bin->updated_at}}</a>
    <a href="#" class="list-group-item list-group-item-action disabled">BinconditionDetails</a>
    <a href="#" class="list-group-item list-group-item-action disabled">Bin_updatedBy: ishBell</a>


  </div>

  @endforeach
@endsection
