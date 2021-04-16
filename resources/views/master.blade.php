<html lang="en">
<head>
    @include('partials._css')
</head>
<body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  @include('partials._header')
</header>

<div class="container-fluid">
  <div class="row">
    @include('partials._sideber')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    	@yield('page_title')
    	
    	@yield('contain')
    </main>
  </div>
</div>

@include('partials._scriptber')
    
</body>
</html>