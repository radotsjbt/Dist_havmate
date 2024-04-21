
@extends('dashboard.layouts.main')
@section('container')

<div class="card">
  <div class="card-body mt-4">
      <a href="/dashboard/offering/index/offer" class="mb-4"> + Offer new product</a>
    
    <!-- Default Table -->
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Offer_ID</th>
          <th scope="col">Customer</th>
          <th scope="col">Product</th>
          <th scope="col">Quantity</th>
          <th scope="col">Total Price</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          @foreach ($offer as $off)
          @if(auth()->user()->username === $off->Farmer_Name)
          <tr>
              <td>{{ $off->Offer_ID}}</td>
              <td>{{ $off->Cust_Name}}</td>
              <td>{{ $off->Harv_Name}}</td>
              <td>{{ $off->Qty}}</td>
              <td>{{ $off->Total_Price}}</td>
              {{-- <td>{{ $off->Status}}</td>            --}}
          </tr>
         @endif
         @endforeach
        
        </tr>
      </tbody>
    </table>
    <!-- End Default Table Example -->
  </div>
</div>

@endsection
