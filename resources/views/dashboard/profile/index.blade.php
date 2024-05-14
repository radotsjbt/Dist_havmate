

@extends('dashboard.layouts.main')

{{-- Detail Customer --}}
@section('container')

<a href="/dashboard">
    <button type="button" class="btn btn-primary mb-3" >
        <i class="ri-arrow-left-line"></i>
        Back
    </button>
</a>
<br>
<section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="{{ asset('assets/img/default.jpg') }}" alt="Profile" class="rounded-circle">
            <h2>{{ $profile->username }}</h2>
            <h3>{{ $profile->User_ID}}</h3> 
            
          </div>
        </div>
      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">

            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">
              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
              </li>
              <li class="nav-item">
                <button class="nav-link " data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
              </li>
                     
            </ul>

            {{-- overview --}}
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">ID</div>
                    <div class="col-lg-9 col-md-8">{{ $profile->User_ID}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Name </div>
                  <div class="col-lg-9 col-md-8">{{ $profile->username }}</div>
                </div>
          
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Address</div>
                  <div class="col-lg-9 col-md-8">{{ $profile->address}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Phone</div>
                  <div class="col-lg-9 col-md-8">{{ $profile->phone }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8">{{ $profile->email}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Web</div>
                  <div class="col-lg-9 col-md-8">{{ $profile->web}}</div>
                </div>
                
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">image_url</div>
                  <div class="col-lg-9 col-md-8">{{ $profile->image_url}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">product_name</div>
                  <div class="col-lg-9 col-md-8">{{ $profile->product_name}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">product_desc</div>
                  <div class="col-lg-9 col-md-8">{{ $profile->product_desc}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">qty</div>
                  <div class="col-lg-9 col-md-8">{{ $profile->qty}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">needs</div>
                  <div class="col-lg-9 col-md-8">{{ $profile->needs}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">latitude</div>
                  <div class="col-lg-9 col-md-8">{{ $profile->latitude}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">longitude</div>
                  <div class="col-lg-9 col-md-8">{{ $profile->longitude}}</div>
                </div>
              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                <form action="/dashboard/profile/update/{{ auth()->user()->id }}" method="post">
                @csrf
                  <div class="row mb-3">
                    <label for="username" class="col-md-4 col-lg-3 col-form-label">Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="username" type="text" class="form-control" id="username" value="{{ $profile->username }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                    <div class="col-md-8 col-lg-9">
                      <textarea name="address" class="form-control" id="address" style="height: 100px" value="{{ $profile->address }}">{{ $profile->address }}</textarea>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="phone" type="text" class="form-control" id="phone" value="{{ $profile->phone }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="email" type="text" class="form-control" id="email" value="{{ $profile->email }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="web" class="col-md-4 col-lg-3 col-form-label">Web</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="web" type="text" class="form-control" id="web" value="{{ $profile->web }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="web" class="col-md-4 col-lg-3 col-form-label">Image Url</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="image_url" type="text" class="form-control" id="image_url" value="{{ $profile->image_url }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="product_name" class="col-md-4 col-lg-3 col-form-label">Product Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="product_name" type="text" class="form-control" id="product_name" value="{{ $profile->product_name }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="product_desc" class="col-md-4 col-lg-3 col-form-label">Product Desc</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="product_desc" type="text" class="form-control" id="product_desc" value="{{ $profile->product_desc }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="qty" class="col-md-4 col-lg-3 col-form-label">QTY</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="qty" type="text" class="form-control" id="qty" value="{{ $profile->qty }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="needs" class="col-md-4 col-lg-3 col-form-label">Purchase Needs</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="needs" type="text" class="form-control" id="needs" value="{{ $profile->needs }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="latitude" class="col-md-4 col-lg-3 col-form-label">Latitude</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="latitude" type="text" class="form-control" id="latitude" value="{{ $profile->latitude }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="longitude" class="col-md-4 col-lg-3 col-form-label">Longitude</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="longitude" type="text" class="form-control" id="longitude" value="{{ $profile->longitude }}">
                    </div>
                  </div>



                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                  </div>
                </form><!-- End Profile Edit Form -->

              </div>
          </div><!-- End Bordered Tabs -->
        </div>

      </div>
    </div>
</section>


@endsection