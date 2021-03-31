<html>
<head>
  <titie>@yield('title')</titie>
  <link href="{{asset('css/style.css')}}" rel="stylesheet">
  <link href="{{asset('css/app.css')}}" rel="stylesheet">
  <style media="screen">
    .pagination li{display: inline-block;}
  </style>
</head>
<body>
  <h1>@yield('title')</h1>
  @section('menuber')
  <ul>
    <p class="menutitle">memu</p>
    <li>@show</li>
  </ul>
  <hr>
  <div class="content">
    @yield('content')
  </div>
  <div class="footer">
    @yield('footer')
  </div>
</body>
</html>
