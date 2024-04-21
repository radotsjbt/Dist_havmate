
@extends('dashboard.layouts.main')
@section('container')


<a href="/dashboard/products/index/addProduct">Tambahkan Produk</a>


<div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">Harvest ID</th>
          <th scope="col">Harvest Result</th>
          <th scope="col">Stock</th>
          <th scope="col">Price (/kg)</th>
          <th scope="col">Image</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $prod)
         @if(auth()->user()->username === $prod->seller)
             <tr>
          <td>{{ $prod->Harv_ID}}</td>
          <td>{{ $prod->Harv_Name}}</td>
          <td>{{ $prod->Harv_Stock}}</td>
          <td>{{ $prod->Harv_Price}}</td>
          <td>{{ $prod->Image_Harv}}</td>
          <td>{{ $prod->Video_Harv}}</td>
          <td>
            <a href="/dashboard/products/{{ $prod->id }}/offer" class="badge bg-warning">
                <span data-feather="edit"></span>
                <form action="/dashboard/products/{{ $prod->id }}" method="post" class=" d-inline" >
                {{-- @method('delete') --}}
                @csrf
                <button type="submit" class="badge-primary" onclick="return confirm('Are you sure to offer this product?')"> 
                <a href="/dashboard/products">
                    <span data-feather="x-circle">Offer</span>
                </button>
                </form>
            </a>
          </td>
        </tr>
        @endif
        @endforeach
       
        
      </tbody>
    </table>
  </div>

@endsection
