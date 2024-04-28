@extends('dashboard.layouts.main')

@section('container')

<h1>Hello {{ auth()->user()->username }}</h1>
<h8>Let's Dive into Havmate!</h8>
@endsection