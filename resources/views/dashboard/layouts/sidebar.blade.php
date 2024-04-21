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
      @can('FarmerCheck')
      <ul class="nav flex-column">
      
        <li class="nav-item">
            <a class="nav-link collapsed {{ Request::is('dashboard/products/index') ? 'active' : '' }}"  
            aria-current="page" href="/dashboard/products/index" data-bs-target="#stock-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-menu-button-wide"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="stock-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
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
            <a href="/dashboard/offering/index">
              </i><span>Offering Status</span>
            </a>
          </li>
          <li>
            <a href="/dashboard/customer/index">
              <span>Send Offering</span>
            </a>
          </li>
        </ul>
       </li>
      </ul>
      @endcan

      @can('DistributorCheck')
      <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/notification/notif') ? 'active' : '' }}"  aria-current="page" href="/dashboard/notification/notif">
                <span data-feather="layers"></span>
                Notifications
              </a>
        </li>
      </ul>
      @endcan

      <li class="nav-item">
        <a class="nav-link collapsed" href="/dashboard/profile/index">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-faq.html">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.html">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->

    </ul>
  </aside><!-- End Sidebar-->