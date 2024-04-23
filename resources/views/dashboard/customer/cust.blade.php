

@extends('layouts.main')

{{-- Detail Customer --}}
@section('container')

<h1>This is detail of customer {{ $cust->id}}</h1>

    {{-- <h1>{{$cust->Cust_Name}}</h1>
    <h5>{{$cust->Cust_Name }} - {{$cust->Cust_Phone}}</h5>
   <br>    
    <h6>{{$cust->Cust_Image }}</h6> --}}


<a href="/customer">Back</a>
@endsection