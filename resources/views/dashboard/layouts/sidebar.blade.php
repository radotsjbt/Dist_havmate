@include('dashboard.layouts.template')

<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-item">
      <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard" aria-current="page">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->
    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <li class="nav-heading">{{ auth()->user()->role }} Pages</li>
    </h6>

    {{-- If the user is farmer --}}
      @can('FarmerCheck')
      <ul class="nav flex-column">
        
          <li class="nav-item">
           <a class="nav-link collapsed {{ Request::is('dashboard/ordering/index') ? 'active' : '' }}"  
            href="/dashboard/ordering/fromDistributor/index">
             <i class="bi bi-cart4"></i><span>Incoming Orders <span class="badge badge-number" id="order" style="background: #0D261D; display: right">0</span></span>
            
            </a><!-- End Messages Icon -->
           </a>

        <li class="nav-item">
            <a class="nav-link collapsed {{ Request::is('dashboard/products/index') ? 'active' : '' }}"  
            aria-current="page" href="/dashboard/products/index" data-bs-target="#products-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-menu-button-wide"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="products-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
              <li>
                <a href="/dashboard/products/index/addProduct">
                 </i><span>Add Product</span>
                </a>
              </li>
              <li>
                <a href="/dashboard/products/index">
                 </i><span>Stock</span>
                </a>
              </li>
            </ul>
        </li>
      </ul>

    <ul class="nav flex-column">
       <li class="nav-item">
        <a class="nav-link collapsed {{ Request::is('dashboard/offering/index') ? 'active' : '' }}"  
        aria-current="page" href="/dashboard/offering/index" data-bs-target="#offering-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-arrow-down-up"></i><span>Offering</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="offering-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/dashboard/offering/toDistributor/index">
              </i><span>Offering Status</span>
            </a>
          </li>
          <li>
            <a href="/dashboard/distributor/index">
              <span>Send Offering</span>
            </a>
          </li>
        </ul>
       </li>
      </ul>
      @endcan

      {{-- If the user is distributor --}}
      @can('DistributorCheck')

     <ul class="nav flex-column">
       <li class="nav-item">
        <a class="nav-link collapsed {{ Request::is('dashboard/offering/index') ? 'active' : '' }}"  
         href="/dashboard/offering/fromFarmer/index">
          <i class="bi bi-arrow-down-up"></i><span>Incoming Offers <span class="badge badge-number" style="background: #0D261D; display: right">0</span></span>
        </a>   

        <ul class="nav flex-column">
          <li class="nav-item">
           <a class="nav-link collapsed {{ Request::is('dashboard/ordering/index') ? 'active' : '' }}"  
           aria-current="page" href="/dashboard/ordering/index" data-bs-target="#ordering-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-cart4"></i><span>Order</span><i class="bi bi-chevron-down ms-auto"></i>
           </a>
           <ul id="ordering-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
             <li>
               <a href="/dashboard/ordering/fromDistributor/index">
                 </i><span>Order Status</span>
               </a>
             </li>
             <li>
               <a href="{{route('new_order')}}">
                 <span>Send Order</span>
               </a>
             </li>
           </ul>
        </li>
      </ul>
      @endcan


      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('rekomendasi')}}">
          <i class="bi bi-person"></i>
          <span>Rekomendasi</span>
        </a>
      </li>

      <li class="nav-item" hidden>
        <a class="nav-link collapsed" href="pages-faq.html">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item" hidden>
        <a class="nav-link collapsed" href="pages-contact.html">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Notification Page Nav -->
     
      
     
      <ul class="nav flex-column"> 
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <li class="nav-heading">Account</li>
        </h6>
      </ul>
        
        <li class="nav-item">
          <a class="nav-link collapsed" href="/dashboard/profile/index/{{ auth()->user()->id }}">
            <i class="bi bi-person"></i>
            <span>Profile</span>
          </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
          
            <form action="/logout" method="POST" >
              @csrf
              <button type="submit" class="nav-link collapsed" id="logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Log Out</span></button>
            </form> 
          
          {{-- <a class="nav-link collapsed" href="/dashboard/profile/index/{{ auth()->user()->id }}">
            <i class="bi bi-box-arrow-left"></i>
            <span>Logout</span>--}} 
        </li>
      
      

  </ul>
</aside><!-- End Sidebar-->