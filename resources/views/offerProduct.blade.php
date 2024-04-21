@extends('layouts.main')
@section('container')


<link href={{ asset("https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" ) }} rel="stylesheet">
<link href={{ asset("https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css") }} rel="stylesheet" >
<form action="/products/offerProduct" method="post" enctype="multipart/form-data">
    @csrf

<h3>Add Your Product</h3>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputHarvName">Harvest Name</label>
        <input type="text" name="inputHarvName"class="form-control" id="inputHarvName" required>
      </div>
      <br>
      <div class="form-group col-md-6">
        <label for="inputHarvDesc">Harvest Description</label>
        <input type="text" name="inputHarvDesc" class="form-control" id="inputHarvDesc" required>
      </div>
   <br>
   <label for="inputHarvType">Harvest Type</label>
   <br>
    <select class="custom-select custom-select-lg padding-5" name="inputHarvType">
        <option selected>select the harvest type</option>
        <option value="Sayuran">Sayuran</option>
        <option value="Buah-buahan">Buah-buahan</option> 
    </select>
<br>
    <br>
    <div class="form-group col-md-3">
      <label for="inputHarvStock">Stock</label>
      <input type="text" name="inputHarvStock" class="form-control" id="inputHarvStock" placeholder="contoh : 20 kg" required>
    </div>
    <br>
    <div class="form-group col-md-3">
        <label for="inputHarvPrice">Price</label>
        <input type="text" name="inputHarvPrice" class="form-control" id="inputHarvPrice" placeholder="per 1 kg" required>
    </div>
    <br>
    <br>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputImage">Image</span>
        </div>
        <div class="custom-file">
          <input type="file" name="inputGroupImage" class="custom-file-input" id="inputGroupImage" aria-describedby="inputImage">
          <label class="custom-file-label" for="inputGroupImage"></label>
        </div>
      </div>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputVideo">Video</span>
        </div>
        <div class="custom-file">
          <input type="file" name="inputGroupVideo" class="custom-file-input" id="inputGroupVideo" aria-describedby="inputVideo">
          <label class="custom-file-label" for="inputGroupVideo"></label>
        </div>
      </div>

  
    <button type="submit" class="btn btn-primary">Add</button>
  </form>
  @endsection