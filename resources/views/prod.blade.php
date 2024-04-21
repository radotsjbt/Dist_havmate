
@extends('layouts.main')

{{-- Single post of Product --}}
@section('container')

<h1>Detail Produk</h1>
    
    <h3>{{$product->Harv_Name}}</h3>

    <h5>{{$product->Harv_Desc }}</h5>
   <br>    
{{-- <h6>Post by - {{$product->users->username}}</h6> --}}


<a href="/products">Back</a>
@endsection