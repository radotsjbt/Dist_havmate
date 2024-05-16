
@extends('home.template')

@section('content')
<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h3 class="logo me-auto"><a href="#"><img src="assets1/img/logo.png" style="margin-right:10px;" alt="" class="img-fluid">Havmate</a></h3>
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="index.html" class="logo me-auto"></a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a class="getstarted scrollto" href="/auth/login">Get Started</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="150">
          <h1>Breaking the Boundary for Farmers to the Market</h1>
          <h2>Better Solutions For Farmers</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="/auth/login" class="btn-get-started">Get Started</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="{{ asset("assets1/img/farmss.png") }}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About Us</h2>
        </div>

        <div class="row content">
          <div class="col-lg-5">
            <p>
              Havmate is an website for connecting the farmer to sell their harvest result. 
              This website developed by Information System students batch 2021 in term of Capstone Project as a graduation requirement.
            </p>
             
            </ul>
          </div>
          <div class="col-lg-7 pt-4 pt-lg-0">
            <p>Three important things about Havmate :</p>
            <li><i class="ri-check-double-line"></i>Connecting the farmer to sell their harvest directly to the market to eliminate long-chain distribution.</li>
            <li><i class="ri-check-double-line"></i>Provide a place where the farmer can offer their harvest, make direct offers and negotiation</li>
            <li><i class="ri-check-double-line"></i>Enable farmers to compare and decide where to sell their goods based on the recommended distributor.</li>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Let's Meet Our Team</h2>

        <div class="row">
          <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="assets1/img/team/tata.jpeg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Taftaniza Auzalya</h4>
                <span>Team Leader</span>
                <p>Information System 2021</p>
                <div class="social">
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="assets1/img/team/siska.png" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Siska Andriani</h4>
                <span>Vice Team Leader</span>
                <p>Information System 2021</p>
                <div class="social">
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4" data-aos="zoom-in" data-aos-delay="300">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="assets1/img/team/devrika.jpeg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Devrika Febrianti</h4>
                <span>Member</span>
                <p>Information System 2021</p>
                <div class="social">
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4" data-aos="zoom-in" data-aos-delay="400">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="assets1/img/team/radot.png" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Radot Sijabat</h4>
                <span>Member</span>
                <p class="align-items-center">Information System 2021</p>
                <div class="social">
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Team Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">


    <div class="footer-top">
      <div class="container">
        <div class="row" style="justify-content: space-between ">

          <div class="col-lg-3 col-md-26 footer-contact">
            <h3>Havmate</h3>
            <p>
              Noth Cikarang <br>
              Bekasi Regency<br>
              West Java, Indonesia <br><br>
              
            </p>
          </div>

          <div class="col-lg-6 col-md-6 footer-links" style="display: flex; justify-content: flex-end;">
            <h4>Useful Links</h4>
            <br>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Team</a></li>
            </ul>
          </div>

        </div>
      </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>Havmate</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Develop by <a href="/home/about" style="color:#ffffff">Havmate</a>
      </div>
    </div>
  </footer><!-- End Footer -->

   
</body>

@endsection
