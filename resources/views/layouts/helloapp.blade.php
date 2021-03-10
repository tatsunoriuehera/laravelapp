<html>
<head>
  <titie>@yield('title')</titie>
  <link href="{{asset('css/style.css')}}" rel="stylesheet">
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
