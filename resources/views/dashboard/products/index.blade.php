
@extends('dashboard.layouts.main')
@section('container')

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Your Product</h5>
   
    <!-- Bordered Table -->
    <table class="table table-bordered align-middle">
      <thead>
        <tr>
          <th scope="col">Harvest Id</th>
          <th scope="col">Harvest Result</th>
          <th scope="col">Price</th>
          <th scope="col">Stock</th>
          <th scope="col">Image</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $prod)
         @if(auth()->user()->username === $prod->Farmer_Name)
            <tr>
              <td>{{ $prod->Harv_ID}}</th>
              <td>{{ $prod->Harv_Name}}</td>
              <td>{{ $prod->Harv_Price}}</td>
              <td>{{ $prod->Harv_Stock}}</td>
              <td>
                <img src="{{ $prod->Image_Harv}}"
                style="height: 100px; width: 150px;">
              </td>
              <td>

                {{-- delete button --}}
                <a href="/dashboard/products/index/{{ $prod->id }}" class="btn-delete">
                  <i class="bi bi-trash3"></i> Delete
                </a>

                {{-- edit button --}}
                <a href="/dashboard/products/editProd/{{ $prod->id }}" class="btn-edit">
                  <i class="bi bi-pen"></i> Edit
                </a>
               
              </td>
            </tr>
          @endif
        @endforeach
      </tbody>
    </table>
    <!-- End Bordered Table -->

@endsection
