{{-- @extends('layouts.app')
             <!--**********************************
!            Content body start
        ***********************************-->
@section('content')
<h1>helllo</h1>
<form action="">
<div>
<select wire:model="province">

    <option value="">Select Province </option>
    @foreach ($provinces as $province )
            <option value="{{$province->provincecode}}">{{$province->provincename}}</option>

    @endforeach
</select>
</div>
@if (!is_null($selectedProvince))


<select wire:model="district">

    <option value="">Select District </option>
    @foreach ($districts as $district )
            <option value="{{$district->districtcode}}">{{$district->district}}</option>

    @endforeach
</select>
@endif

<select id="sectorcode">

    <option value="">Select Sector </option>
</select>

@livewireScripts

@endsection
</form> --}}

{{-- @extends('layouts.app')
@section('content') --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link href="{{ asset('backend/assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/libs/selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App css -->
    <link href="{{ asset('backend/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
    <!-- icons -->
    <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Head js -->
    <script src="{{ asset('backend/assets/js/head.js') }}"></script>
    <script src="{{ asset('backend/assets/js/validate.min.js') }}"></script>
    <!-- inputTags css -->
    <link href="{{ asset('backend/assets/libs/mohithg-switchery/switchery.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('backend/assets/libs/multiselect/css/multi-select.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/libs/selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('backend/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
    <!-- inputTags css -->


    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: 'textarea'
        });
    </script>
    <script src="{{ asset('backend/assets/libs/jquery-mockjax/jquery.mockjax.min.js') }}"></script>
<div>
    <div class="mb-8">
        <label class="inline-block w-32 font-bold">Country:</label>
        <select name="provincecode" class="border shadow p-2 bg-white">
            <option value=''>Choose a province</option>
            @foreach($provinces as $province)
                <option value="{{$province->provincecode}}">{{$province->provincename}}</option>
            @endforeach



        </select>
    </div>

        <div class="mb-8">
            <label class="inline-block w-32 font-bold">districts:</label>
            <select name="districtcode"
                class="p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
                <option value="">Select District </option>
                @foreach ($districts as $district )
                        <option value="{{$district->districtcode}}">{{$district->namedistrict}}</option>

                @endforeach
            </select>
        </div>

</div>
<script src="{{ asset('backend/assets/js/vendor.min.js') }}"></script>

    <!-- Plugins js-->
    <script src="{{ asset('backend/assets/libs/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <script src="{{ asset('backend/assets/libs/selectize/js/standalone/selectize.min.js') }}"></script>

    <!-- Dashboar 1 init js-->
    <script src="{{ asset('backend/assets/js/pages/dashboard-1.init.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('backend/assets/js/code.js') }}"></script>

    <!-- App js-->
    <script src="{{ asset('backend/assets/js/app.min.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="provincecode"]').on('change', function() {
            var provincecode = $(this).val();
            if (provincecode) {
                $.ajax({
                    url: "{{ url('/district/ajax') }}/" + provincecode,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="districtcode"]').html('');
                        var d = $('select[name="districtcode"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="districtcode"]').append(
                                '<option value="' + value.id + '"> ' + value
                                .namedistrict + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
</script>
