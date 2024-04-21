
<link href={{ asset("https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" ) }} rel="stylesheet">
<link href="css/style.css" rel="stylesheet">

<div class="card-body p-5 mb-md-5 mt-md-4 pb-5">
<form action="/dashboard/products/index/addProduct" method="post" 
enctype="multipart/form-data" class="form-group ml-5">
    @csrf

<h3 >Add Your Product</h3>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputHarvName">Harvest Name</label>
        <input type="text" name="inputHarvName"class="form-control" id="inputHarvName" required>
      </div>
      <br>
      <div class="form-group col-md-6">
        <label for="inputHarvDesc">Harvest Description</label>
        <input type="text" name="inputHarvDesc" class="form-control" id="inputHarvDesc" required>
        <div class="invalid-feedback">Please enter your product name!</div>
      </div>
   <br>
   <div class="">
   <label for="inputHarvType">Harvest Type</label>
   <br>
    <select class="custom-select custom-select-lg padding-5" name="inputHarvType">
        <option selected>select the harvest type</option>
        <option value="Sayuran">Sayuran</option>
        <option value="Buah-buahan">Buah-buahan</option> 
    </select>
   </div>
    <br>
    <br>
    <div class="form-group col-md-3">
      <label for="inputHarvStock">Stock</label>
      <input type="text" name="inputHarvStock" class="form-control" id="inputHarvStock" placeholder="ex : 20 kg" required>
      <div class="invalid-feedback">Please input your product's stock!</div>
    </div>
    <br>
    <div class="form-group col-md-3">
        <label for="inputHarvPrice">Price</label>
        <input type="text" name="inputHarvPrice" class="form-control" id="inputHarvPrice" placeholder="per 1 kg" required>
        <div class="invalid-feedback">Please input your product's price!</div>
    </div>
    <br>
    <br>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputImage">Image</span>
        </div>
        <div class="custom-file">
          <input type="file" name="inputGroupImage" class="custom-file-input" id="inputGroupImage" aria-describedby="inputImage" required>
          <label class="custom-file-label" for="inputGroupImage"></label>
          <div class="invalid-feedback">Please upload your product's image!</div>
        </div>
      </div>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputVideo">Video</span>
        </div>
        <div class="custom-file">
          <input type="file" name="inputGroupVideo" class="custom-file-input" id="inputGroupVideo" aria-describedby="inputVideo" required>
          <label class="custom-file-label" for="inputGroupVideo"></label>
          <div class="invalid-feedback">Please upload your product's video!</div>
        </div>
      </div>

  
    <button type="submit" class="btn btn-primary">Add</button>
  </form>
</div>
  