@extends('layouts.layout')


    @section('content')

        @if(Session::has('success'))
            <div class="alert alert-success ">
                {{Session::get('success')}}
            </div>
        @endif
<div class="position-relative d-flex-columns" style="display:flex; flex-direction:column; align-items:center;" id="venuecards">
    <h1 class="mt-5 mb-4 text-daek">ΠΑΡΑΣΤΑΣΕΙΣ</h1>
    <div class="w-100 row  justify-content-center" >
    @foreach($venues as $venue)
        @include('venue')

  @endforeach
    </div>
</div>

  @endsection
