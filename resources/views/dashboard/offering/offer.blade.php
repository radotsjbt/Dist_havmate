
@extends('dashboard.layouts.main')

@section('container')


<div class="card">
  <div class="card-body">
    <h5 class="card-title">Send your product, {{ auth()->user()->username }}!</h5>

    <!-- Add product Form -->
    <form action= "/dashboard/offering/index/{{ $dist->id }}" method="post" 
    enctype="multipart/form-data" class="row g-3">
      @csrf
      <div class="col-md-6">
        <label for="inputDistName">Distributor Name</label>
          <input type="text" name="inputDistName"class="form-control" id="inputDistName" value="{{ $dist->Dist_Name }}" disabled>
      </div>

      <div class="col-md-6">
        <label for="inputHarvName">Harvest Result</label>
        <div class="input-group ">
          <select class="form-select mt-0" id="floatingSelect" name="inputHarvName" aria-label="Harvest Type">
            <option selected>Choose your product</option>
              @foreach($product as $item)
                  @if(auth()->user()->username === $item->seller)
                      <option value="{{ $item->Harv_Name }}">{{ $item->Harv_Name }}</option>
                  @endif
              @endforeach 
          </select>
        </div>
      </div>

      <div class="col-md-6">
        <label for="inputHarvQty">Quantity (/kg)</label>
        <input type="text" name="inputHarvQty" class="form-control" id="inputHarvQty" placeholder="ex : 20" required>
      </div>

      <div class="col-md-6">
        <label for="inputTotalPrice">Total Price</label>
          <div class="input-group col-sm-10">
            <span class="input-group-text" id="inputGroupPrepend">Rp</span>
            <input type="text" name="inputTotalPrice" class="form-control" id="inputTotalPrice" placeholder="ex : 240000" required>
            <div class="invalid-feedback">Please input your product's price!</div>
          </div>
      </div>
      
      <div class="inputNotes col-md-6">
        <label for="inputNotes">Notes</label>
        <input type="text" name="inputNotes" class="form-control" id="inputNotes">
      </div>


      <div class="text-center mt-5">
        <button type="submit" class="btn btn-primary">Send offering</button>
      </div>

</form>

  </div>
</div>
    {{-- <div class="form-row">
      <label for="inputQty">Quantity</label>
      <input type="text" name="inputQty" class="form-control" id="inputQty" required>
      <br>
      <br>
      <label for="inputHarvName">Harvest Name</label>
      <br>
    <select class="custom-select custom-select-lg padding-5" name="inputHarvName">
        <option selected>Choose your product</option>
        {{-- Looping for customer name on user table --}}
        {{-- @foreach($product as $item)
            @if(auth()->user()->username === $item->seller)
                <option value="{{ $item->Harv_Name }}">{{ $item->Harv_Name }}</option>
            @endif
        @endforeach --}}
    {{-- </select>
    <br>
   <br>
    </div>
   <div class="form-group col-md-6">
    <label for="inputQty">Quantity</label>
    <input type="text" name="inputQty" class="form-control" id="inputQty" required>
  </div>
    
    <br>
    <div class="form-group col-md-3">
      <label for="inputTotalPrice">Total Price</label>
      <input type="text" name="inputTotalPrice" class="form-control" id="inputTotalPrice" placeholder="in Rupiah" required>
    </div>
    <br>
    <div class="form-group col-md-3">
        <label for="inputNotes">Notes</label>
        <input type="text" name="inputNotes" class="form-control" id="inputNotes" placeholder="(opsional)">
    </div>
    <br>

  
    <button type="submit" class="btn btn-primary" >Offer</button>
  </form>
</div>  --}}
@endsection


