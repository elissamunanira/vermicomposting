{{-- <div> --}}
    {{-- <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal"> --}}
    {{-- {{ csrf_field() }} --}}
        <div class="card-body">
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="status">Select Province</label>
                    <select class="form-control"  name="province" wire:model="selectedProvince">
                        <option value="">Select a Province</option>
                        @foreach ($provinces as $item)
                        <option value="{{ $item->provincecode }}">{{ $item->provincename }}</option>
                        @endforeach
                    </select>
                </div>
                  @if($errors->has('province'))
                <span class="text-danger">
                  {{$errors->first('province')}}
                </span>
                @endif


            </div>

            {{$selectedProvince}}

            @if (!is_null($districts))
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="status">Select a District</label>
                    <select class="form-control" name="district" wire:model="selectedDistrict">
                        <option value="{{ $item->districtcode}}">Select a District</option>
                        @foreach ($districts as $item)
                        <option value="{{ $item->districtcode }}">{{ $item->namedistrict}}</option>
                        @endforeach
                    </select>
                </div>

                @if($errors->has('district'))
                <span class="text-danger">
                  {{$errors->first('district')}}
                </span>
                @endif



            </div>
            @endif
            {{$selectedDistrict}}

            {{-- @if (!is_null($sectors)) --}}
            @if(!empty($sectors))
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="status">Select a Sector</label>
                    <select class="form-control" name="sector"   wire:model="selectedSector">
                        <option value="">Select a District</option>
                        @if(!empty($sectors))
                        @foreach ($sectors as $item)
                        <option value="{{ $item->sectorcode }}">{{ $item->namesector}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
                @if($errors->has('sector'))
                                <span class="text-danger">
                                  {{$errors->first('sector')}}
                                </span>
                                @endif

            </div>
            @endif
            {{-- @endif --}}
            {{$selectedSector}}


            {{-- @if (!is_null($sectors)) --}}
            @if(!empty($cells))
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="status">Select a Cell</label>
                    <select class="form-control" name="cell"    wire:model="selectedCell">
                        <option value="">Select a Cell</option>

                        @foreach ($cells as $item)
                        <option value="{{ $item->codecell }}">{{ $item->nameCell}}</option>
                        @endforeach

                    </select>
                </div>
                @if($errors->has('cell'))
                <span class="text-danger">
                  {{$errors->first('cell')}}
                </span>
                @endif

            </div>
             @endif
            {{$selectedCell}}







        </div>

{{--
    </form> --}}
{{-- </div> --}}
