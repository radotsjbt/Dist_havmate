
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
       @foreach ($customer as $cust) 
          <div class="card">
            <a href = "/dashboard/customer/cust/{{ $cust->id}}">
              <img src="{{ asset("assets/img/card.jpg") }}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"> {{ $cust->Cust_Name }}</h5>
                <p class="card-text">
                </p>
              </div>
            </a>
          </div>
      @endforeach           
    </div>
    
@endsection
