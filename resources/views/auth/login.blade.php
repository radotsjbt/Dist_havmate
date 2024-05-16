@extends('auth.layout')

@section('container')
<html>
<body>
  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="/" class="logo d-flex align-items-center w-auto">
                  <img src="{{ asset("assets/img/logo-2.png") }}" alt="">
                  <span class="d-none d-lg-block">Havmate</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>

                  <form action="/auth/login" method="post" class="row g-3 needs-validation">
                    {{-- this cross site request forgery (csrf) to protect user from csrf attacks --}}
                    {{ csrf_field() }}
                    @if(session()->has('Login Successfully'))
                    
                    @endif
                    @if(session()->has('loginError'))
                      <div class="alert alert-danger" role="alert">
                        Incorrect Username or Password!
                      </div>
                    @endif

                    <div class="col-12">
                      <label for="yourEmail">Email</label>
                      <div class="input-group ">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" 
                        placeholder="name@example.com" autofocus required value="{{ old('email')}}" id="yourEmail" required>
                        <div class="invalid-feedback">Please enter your username correctly!</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>
                    <div class="col-12"><br>
                      <button class="btn-login w-50 position-relative top-98 start-50 translate-middle" type="submit" id="login">
                        Login
                      </button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Don't have account?<a href="/auth/regist"> Create an account</a></p>
                    </div>
                  </form>

                </div>
              </div>

              
            
            </div>
          </div>
        </div>
      </section>

    </div>
  </main><!-- End #main -->
</body>
{{-- <script>
  $('#login').click(function(){
      Swal.fire({
        title: "Successful Login!",
        icon: "success"
      });
    });
</script> --}}
</html>
@endsection