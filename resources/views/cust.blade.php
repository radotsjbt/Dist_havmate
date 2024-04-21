

@extends('layouts.main')

{{-- Single post of Customer --}}
@section('container')
    <h1>{{$post->Company_Name}}</h1>

    <h5>{{$post->Cust_Name }} - {{$post->Cust_Phone}}</h5>
   <br>    
    <h6>{{$post->Company_Image }}</h6>


<a href="/customer">Back</a>
@endsection