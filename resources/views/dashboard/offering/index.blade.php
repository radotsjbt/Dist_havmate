
@extends('dashboard.layouts.main')
@section('container')

<div class="card">
  <div class="card-body mt-4">
   
    @can('FarmerCheck')
    {{-- Farmer Page --}}
    {{-- show all the offering status --}}
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Offer_ID</th>
          <th scope="col">Distributor</th>
          <th scope="col">Product</th>
          <th scope="col">Quantity (/kg)</th>
          <th scope="col">Total Price</th>
          <th scope="col">Notes</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>
        </tr>
      </thead>

      <tbody>
        <tr>
          @foreach ($offering as $off)
          {{-- check the user with their offering data --}}
          @if(auth()->user()->username === $off->Farmer_Name)
          <tr>
              <td>{{ $off->Offer_ID}}</td>
              <td>{{ $off->Dist_Name}}</td>
              <td>{{ $off->Harv_Name}}</td>
              <td>{{ $off->Qty}}</td>
              <td>{{ $off->Offer_Price}}</td>
              <td>{{ $off->Notes}}</td>
              <td id="farmer_status">{{ $off->status }}</td> 
              <td id="farmer_action">
                {{-- delete button --}}
                <a href="/dashboard/offering/index/{{ $off->id }}" class="btn btn-danger" id="btnDelete" style="color: white; text-decoration:none">
                  <i class="bi bi-trash3" style="color: white;"></i> Delete
                </a>

                {{-- edit button --}}
                <a href="/dashboard/offering/editOff/{{ $off->id }}" class="btn btn-primary" id="btnEdit" style="color: white;text-decoration:none">
                  <i class="bi bi-pen" style="color: white;"></i> Edit
                </a>
              </td>  
          </tr>
         @endif
         @endforeach
        </tr>
      </tbody>
    @endcan


      
      @can('DistributorCheck')
      {{-- Distributor Page --}}
       {{-- show all the offering status --}}
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Offer_ID</th>
              <th scope="col">Farmer Name</th>
              <th scope="col">Product</th>
              <th scope="col">Quantity (/kg)</th>
              <th scope="col">Total Price</th>
              <th scope="col">Notes</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              @foreach ($offering as $off)
              {{-- check the user with their offering data --}}
              @if(auth()->user()->username === $off->Dist_Name)
              <tr>
                  <td>{{ $off->Offer_ID}}</td>
                  <td>{{ $off->Farmer_Name}}</td>
                  <td>{{ $off->Harv_Name}}</td>
                  <td>{{ $off->Qty}}</td>
                  <td>{{ $off->Offer_Price}}</td>
                  <td>{{ $off->Notes}}</td>
                  <td>{{ $off->status }}</td> 
                  <td>
                    
                    {{-- accept button --}}
                    <a href="/dashboard/offering/fromFarmer/acceptOffering/{{ $off->id }}" class="btn btn-success" id= "btnAccept"  style="color: white; text-decoration:none;">
                      <i class="bi bi-check-circle" style="color: white;"></i> Accept
                    </a>

                    {{-- decline button --}}
                    <a href="/dashboard/offering/fromFarmer/declineOffering/{{ $off->id }}" class="btn btn-danger" id= "btnDecline"  style="color: white; text-decoration:none;">
                      <i class="bi bi-ban" style="color: white;"></i> Decline
                    </a> 
                  </td>  
              </tr>
            @endif
            @endforeach
            </tr>
          </tbody>
      @endcan
    </table>
    <!-- End Default Table Example -->

        {{-- pagination --}}
        <div class="page d-flex">
          {{ $offering->links() }}
        </div>

  </div>
</div>

<script>
// $(document).ready(function () {
//   var disableButton = (e) => {
//     $('#btnDecline').prop('disabled', true);
    
//     $(document).on('click', '#btnAccept', disableButton);
// };
// });


</script>

@endsection
