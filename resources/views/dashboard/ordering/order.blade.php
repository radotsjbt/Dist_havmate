
@extends('dashboard.layouts.main')

@section('container')


<div class="card">
  <div class="card-body">
    <h5 class="card-title">Let's ordering some products, {{ auth()->user()->username }}!</h5>

    <!-- Ordering Form -->
    <form action= "/dashboard/ordering/index/{{ $product->id }}" method="post" 
    enctype="multipart/form-data" class="row g-3">
      @csrf
      <div class="col-md-6">
        <label for="inputProdName">Product Name</label>
          <input type="text" name="inputProdName"class="form-control" id="inputProdName" value="{{ $product->Harv_Name }}" disabled>
      </div>

      <div class="col-md-6">
        <label for="inputHarvStock">Stock (/kg)</label>
          <input type="text" name="inputHarvStock" data-stock="{{ $product->Harv_Stock }}" class="form-control" id="inputHarvStock" disabled>
      </div>

      <div class="col-md-6">
        <label for="inputQty">Quantity (/kg)</label>
          <input type="text" name="inputQty"class="form-control" id="inputQty" placeholder="ex : 250">
      </div>

      <div class="col-md-6">
        <label for="inputTotalPrice">Total Price</label>
          <div class="input-group col-sm-10">
            <span class="input-group-text" id="inputGroupPrepend">Rp</span>
            <input type="text" name="inputTotalPrice" class="form-control" id="inputTotalPrice" placeholder="ex : 240000" required>
          </div>
      </div>
      
      <div class="inputNotes col-md-6">
        <label for="inputNotes">Notes</label>
        <input type="text" name="inputNotes" class="form-control" id="inputNotes">
      </div>

      <div class="text-center mt-5">
        <button type="submit" class="btn btn-primary">Send order</button>
      </div>

</form>

  </div>
</div>
@endsection


