@include('dashboard.layouts.template')

<html>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Dashboard | {{ $title }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

</head>
<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    {{-- logo --}}
    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="{{ asset("assets/img/logo-1.png") }}" alt="">
        <span class="d-none d-lg-block">Havmate</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
       
<<<<<<< HEAD

        {{-- notification --}}
        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="{{route('offering_index')}}">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number" id="notificationBadge">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="{{route('offering_index')}}"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            {{-- changes this to realtime notif message --}}
            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="{{route('chat.page')}}">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number"></span>
          </a><!-- End Messages Icon -->

          

        </li><!-- End Messages Nav -->

=======
>>>>>>> 7f18663ccf1d41debb5fe9fa1d6de3493169742d
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{ asset('assets/img/default.jpg') }}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->username }}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ auth()->user()->username }}</h6>
              <span>{{ auth()->user()->role }}</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="/dashboard/profile/index/{{ auth()->user()->id }}">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <form action="/logout" method="GET">
                @csrf
                <button type="submit" class="dropdown-item" id="logout"><i class="bi bi-box-arrow-right"></i>
                  <span>Log Out</span></button>
              </form> 
            </li>
          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->
</body>
<script>
//   $('#logout').click(function(){
//   const swalWithBootstrapButtons = Swal.mixin({
//   customClass: {
//     confirmButton: "btn btn-success",
//     cancelButton: "btn btn-danger"
//   },
//   buttonsStyling: false
// });
// swalWithBootstrapButtons.fire({
//   title: "Are you sure?",
//   text: "Logout",
//   icon: "warning",
//   showCancelButton: true,
//   confirmButtonText: "Yes",
//   cancelButtonText: "No",
//   reverseButtons: true
// }).then((result) => {
//   if (result.isConfirmed) {
//     swalWithBootstrapButtons.fire({
//       title: "Logout!",
//       icon: "success"
//     });
//   }
// });
//   });
</script>
</html>

