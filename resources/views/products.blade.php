
<body>

    @extends('layouts.main')
    
    @section('container')
        
    
    <h2 class="fw-bold mb-2 text-uppercase">Products</h2>
  <br>

<body>
    {{-- Add products --}}
    <a href="/products/addProduct">Tambahkan Produk</a>
<br>
<br>
    @foreach($products as $product)
        
        
        <h2><a href="/products/{{ $product->farmer_id}}/{{ $product->Harv_Name }}">{{ $product->Harv_Name }}</a></h2>
    
        <h6>{{ $product->Harv_Desc }}</h6>
        <h6>Stock : {{$product->Harv_Stock }} </h6>
        <h6>Harga : {{ $product->Harv_Price }} / kg</h6>

        <h6>Author : {{ $product->seller}}</h6>
       
<button href="/offer">Kirim Penawaran</button>
<br>
<br>
   

</body>
 @endforeach
    @endsection
    
   
    