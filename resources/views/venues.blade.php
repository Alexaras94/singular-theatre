@extends('layouts.layout')


    @section('content')

        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif
<div class="container" id="venuecards">
    <h1>VENUES</h1>
    @foreach($venues as $venue)
        @include('venue')



{{--                <button type="button" class="btn btn-info btn-lg" data-id='{{ $venue->id }}' data-target="myModal">Open Modal</button>--}}

{{--                <a href="#"  class="btn btn-success" data-toogle="modal" data-bs-target="#ModalReserve">Go somewhere</a>--}}

  @endforeach
</div>

  @endsection
