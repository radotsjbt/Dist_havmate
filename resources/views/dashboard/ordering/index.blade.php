
@extends('dashboard.layouts.main')
@section('container')

<div class="card">
  <div class="card-body mt-4">
        
    {{-- Order Status --}}
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Order_ID</th>
          <th scope="col">Products</th>
          <th scope="col">Quantity</th>
          <th scope="col">Farmer Name</th>
          <th scope="col">Total Price</th>
          <th scope="col">Notes</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          @foreach ($ordering as $order)
          @if(auth()->user()->username === $order->Dist_Name || auth()->user()->username === $order->Farmer_Name )
          <tr>
              <td>{{ $order->Order_ID}}</td>
              <td>{{ $order->Harv_Name}}</td>
              <td>{{ $order->Qty}}</td>
              <td>{{ $order->Farmer_Name}}</td>
              <td>{{ $order->Total_Price}}</td>
              <td>{{ $order->Notes}}</td>
              <td>{{ $order->status}}</td>
              <td>

                @if ($order->status == 'dikirim')
                  <a href="{{route('accept_order',$order->id)}}" class="btn btn-success" id= "btnAccept"  style="color: white; text-decoration:none;">
                      <i class="bi bi-check-circle" style="color: white;"></i> Diterima
                    </a>

                    {{-- decline button --}}
                    <a href="{{route('decline_order',$order->id)}}" class="btn btn-danger" id= "btnDecline"  style="color: white; text-decoration:none;">
                      <i class="bi bi-ban" style="color: white;"></i> Ditolak
                    </a> 
                @else
                {{-- delete button --}}
                <!-- <a href="/dashboard/ordering/index/{{ $order->id }}" class="btn btn-danger" style="color: white;">
                  <i class="bi bi-trash3" style="color: white;"></i> Delete
                </a> -->

                {{-- edit button --}}
                <!-- <a href="/dashboard/ordering/editOrder/{{ $order->id }}" class="btn btn-primary" style="color: white;">
                  <i class="bi bi-pen" style="color: white;"></i> Edit
                </a> -->


                @endif

                
               
              </td>          
          </tr>
         @endif
         @endforeach
        
        </tr>
      </tbody>
    </table>
   
  </div>
</div>

@endsection
