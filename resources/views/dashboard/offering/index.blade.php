
@extends('dashboard.layouts.main')
@section('container')

<div class="card">
  <div class="card-body mt-4">
        
    {{-- show all the offering status --}}
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Offer_ID</th>
          <th scope="col">Farm Name</th>
          <th scope="col">Harvest Name</th>
          <th scope="col">Quantity</th>
          <th scope="col">Total Price</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          @foreach ($offering as $off)
          {{-- check the user with their offering data --}}
          @if(auth()->user()->username === $off->Farmer_Name || (auth()->user()->id === $off->Dist_Id))  
          <tr>
              <td>{{ $off->Offer_ID}}</td>
              <td>{{ $off->Dist_Name}}</td>
              <td>{{ $off->Harv_Name}}</td>
              <td>{{ $off->Qty}}</td>
              <td>{{ $off->Offer_Price}}</td>
              <td>{{ $off->status }}</td> 
              <td>

                {{-- delete button --}}
                @if ($off->status=='Waiting')
                <a href="/dashboard/offering/accept/{{ $off->id }}" class="btn btn-primary">
                   Accept
                </a>

                {{-- edit button --}}
                <a href="/dashboard/offering/decline/{{ $off->id }}" class="btn btn-warning">
                   Decline
                </a>
                @endif
               
              </td>          
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
