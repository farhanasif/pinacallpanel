<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="list-unstyled ps-0">
          <li class="mb-1">
            <div class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
              Guest
            </div>
            <div class="collapse" id="dashboard-collapse" style="">
              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li><a class="dropdown-item" href="{{route('all.guest')}}">All Guest</a></li>
              </ul>
            </div>
          </li>
          <li class="mb-1">
            <div class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
              Host
            </div>
            <div class="collapse" id="orders-collapse" style="">
              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li><a class="dropdown-item" href="{{route('all.host')}}">All Host</a></li>
              </ul>
            </div>
          </li>
          <li class="mb-1">
            <div class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
              Balance
            </div>
            <div class="collapse" id="orders-collapse" style="">
              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li><a class="dropdown-item" href="{{route('all.balance')}}">All Balance</a></li>
              </ul>
            </div>
          </li>
          <li class="mb-1">
            <div class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
              Report
            </div>
            <div class="collapse" id="orders-collapse" style="">
              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li><a class="dropdown-item" href="#">Approve Of Settlement Request</a></li>
                <li><a class="dropdown-item" href="#">Date Wise Host Report</a></li>
                <li><a class="dropdown-item" href="#">Month Wise Host Report</a></li>
                <li><a class="dropdown-item" href="#">Call Details</a></li>
              </ul>
            </div>
          </li>
        </ul>
        {{-- <div class="dropdown">
          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown link
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </div> --}}
      </div>
    </nav>