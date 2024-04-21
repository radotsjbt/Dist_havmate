


@extends('dashboard.layouts.main')

@section('container')

{{-- search bar --}}
<div class="row height d-flex justify-content-center align-items-center">
  <div class="col-md-6">

    <div class="form">
      
      <input type="text" class="form-control form-input" placeholder="Search...">
      
    </div>
    
  </div>
  
</div>
<!-- End Search Bar -->

{{-- Show the distributor lists from database --}}
<div class="flex-container" > 
     @foreach ($us as $user)
        @if($user->role === 'Distributor')     
            <div class="card">
              <img src="{{ asset("assets/img/card.jpg") }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"> {{ $user->username }}</h5>
                <p class="card-text">
                </p>
              </div>
            </div>
          
    @endif
      @endforeach
    </div>
@endsection


