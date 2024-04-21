


<link href={{ asset("https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" ) }} rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href={{ asset("https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css") }} rel="stylesheet" >
<link href="css/style.css" rel="stylesheet">

<div class="card-body p-5 mb-md-5 mt-md-4 pb-5">
<form action="/dashboard/offering/index/offer" method="post" 
enctype="multipart/form-data" class="form-group ml-5">
    @csrf

<h3 >Send your Product, {{ auth()->user()->username }}!</h3>

    <div class="form-row">
      <label for="inputCustName">Customer Name</label>
   <br>
    <select class="custom-select custom-select-lg padding-5" name="inputCustName">
        <option selected>Choose your customer</option>
        {{-- Looping for customer name on user table --}}
        @foreach($user as $item)
            @if($item->role === 'Distributor' )
                <option value="{{ $item->username }}">{{ $item->username }}</option>
            @endif
        @endforeach
    </select>
      <br>
      <br>
      <label for="inputHarvName">Harvest Name</label>
      <br>
    <select class="custom-select custom-select-lg padding-5" name="inputHarvName">
        <option selected>Choose your product</option>
        {{-- Looping for customer name on user table --}}
        @foreach($product as $item)
            @if(auth()->user()->username === $item->seller)
                <option value="{{ $item->Harv_Name }}">{{ $item->Harv_Name }}</option>
            @endif
        @endforeach
    </select>
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
</div>


