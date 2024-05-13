
@extends('dashboard.layouts.main')

@section('container')


<div class="card">
  <div class="card-body">
    <h5 class="card-title">Let's ordering some products, {{ auth()->user()->username }}!</h5>

    <!-- Ordering Form -->
    <form action= "{{route('sendOrderNew')}}" method="post" 
    enctype="multipart/form-data" class="row g-3">
      @csrf
      <div class="col-md-6">
        <label for="inputProdName">Product Name (Harv Name) (Harv Stock)</label>
        <select class="select2 form-control" name="Harv_Id" id="Harv_Id">
          @foreach ($products as $p )
          <option value="{{$p->id}}">{{$p->Harv_Name.' ('.$p->Farmer_Name.') '.' ('.$p->Harv_Stock.') '}}</option>
          @endforeach
        </select>
      </div>

      <div class="col-md-6">
        <label for="inputHarvStock">Stock (/kg)</label>
          <input type="text" name="inputHarvStock" class="form-control" id="inputHarvStock" value="{{$products[0]->Harv_Stock}}" disabled>
      </div>

      <div class="col-md-6">
        <label for="inputQty">Quantity (/kg)</label>
          <input type="text" name="inputQty"class="form-control" id="inputQty" placeholder="ex : 250">
      </div>

      <div class="col-md-6">
        <label for="inputTotalPrice">Price</label>
          <div class="input-group col-sm-10">
            <span class="input-group-text" id="inputGroupPrepend">Rp</span>
            <input id="price" readonly type="text" class="form-control" value="{{$products[0]->Harv_Price}}"
                    name="price" disabled>
          </div>
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

<script>
  products = <?php echo json_encode($products) ?>;
  console.log(products);
        $(document).ready(function() {
            $('.select2').select2();
        });

        $(document).ready(function() {
  // Attach a change event listener to the Harv_Id select element
  $('#Harv_Id').change(function() {
    const selectedId = $(this).val(); // Get the selected product ID
console.log(selectedId);
    // Find the corresponding product data from the $products array (assuming it's available in your Javascript scope)
    const selectedProduct = products.find(p => p.id == selectedId);
    console.log(selectedProduct);

    if (selectedProduct) {
      // Update the inputHarvStock value with the selected product's stock
      $('#inputHarvStock').val(selectedProduct.Harv_Stock);
      $('#price').val(selectedProduct.Harv_Price);

      // Clear any previous total price or quantity values
      $('#inputQty').val('');
      $('#inputTotalPrice').val('');

      // Recalculate the total price if the quantity field already has a value
      const currentQty = $('#inputQty').val();
      if (currentQty) {
        const price = $('#price').val(); // Assuming price is set elsewhere
        const totalPrice = currentQty * price;
        $('#inputTotalPrice').val(totalPrice);
      }
    }
  });
});
    </script>

<script>
  $(document).ready(function() {
      // Attach a change event listener to the input field
      $('#inputQty').change(function() {
          // Get the current value of the input field

          if (parseInt($('#inputQty').val()) > parseInt($('#inputHarvStock').val())) {
              const res = parseInt($('#inputQty').val()) - parseInt($('#inputHarvStock').val());
              Swal.fire({
                  title: 'Out of Stock',
                  text: 'kamu membutuhkan sekitar ' + res + 'pcs lagi',
                  icon: 'info',
                  confirmButtonText: 'OK'
              }).then((result) => {
                  if (result.isConfirmed) {
                      $('#inputQty').val($('#inputHarvStock').val())
                  }
              });

          }
          let inputValue = $(this).val();
          const price = $('#price').val();
          const res = parseInt(inputValue) * parseInt(price);
          let total_value = $('#inputTotalPrice').val(res);
          console.log('The input value has changed to: ' + res);
      });
  });
</script>
@endsection


