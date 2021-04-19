<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <aside class="bd-aside sticky-xl-top text-muted align-self-start mb-3 mb-xl-5 px-2">
    {{-- <h2 class="h6 pt-4 pb-3 mb-4 border-bottom">On this page</h2> --}}
    <nav class="small" id="toc">
      <ul class="list-unstyled">
        <li class="my-2">
          <button class="btn d-inline-flex align-items-center collapsed" data-bs-toggle="collapse" aria-expanded="false" data-bs-target="#contents-collapse" aria-controls="contents-collapse">Guest</button>
          <ul class="list-unstyled ps-3 collapse" id="contents-collapse">
            <li><a class="dropdown-item" href="{{route('all.guest')}}">All Guest</a></li>
          </ul>
        </li>
        <li class="my-2">
          <button class="btn d-inline-flex align-items-center collapsed" data-bs-toggle="collapse" aria-expanded="false" data-bs-target="#forms-collapse" aria-controls="forms-collapse">Host</button>
          <ul class="list-unstyled ps-3 collapse" id="forms-collapse" style="">
            <li><a class="dropdown-item" href="{{route('all.host')}}">All Host</a></li>
          </ul>
        </li>
        <li class="my-2">
          <button class="btn d-inline-flex align-items-center collapsed" data-bs-toggle="collapse" aria-expanded="false" data-bs-target="#components-collapse" aria-controls="components-collapse">Balance</button>
          <ul class="list-unstyled ps-3 collapse" id="components-collapse">
            <li><a class="dropdown-item" href="{{route('all.balance')}}">All Balance</a></li>
          </ul>
        </li>
        <li class="my-2">
          <button class="btn d-inline-flex align-items-center collapsed" data-bs-toggle="collapse" aria-expanded="false" data-bs-target="#components-collapse" aria-controls="components-collapse">Report</button>
          <ul class="list-unstyled ps-3 collapse" id="components-collapse">
            <li><a class="dropdown-item" href="#">Approve Of Settlement Request</a></li>
            <li><a class="dropdown-item" href="#">Date Wise Host Report</a></li>
            <li><a class="dropdown-item" href="#">Month Wise Host Report</a></li>
            <li><a class="dropdown-item" href="#">Call Details</a></li>
          </ul>
        </li>
      </ul>
    </nav>
  </aside>
    </nav>