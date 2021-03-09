<html>
<head>
<link href="{{asset('css/style.css')}}" rel="stylesheet"></head>
<body>

  <h1>Blade</h1>
  @if($msg!='')
  <p>{{$msg}}</p>
  @else
  <p>please input name</p>
  @endif
  <form method="POST" action="/laravelapp/public/hello">
  {{--<form method="POST" action="/hello">--}}
    {{-- csr対策 --}}
    {{ csrf_field() }}
    <input type="text" name="msg" autofocus>
    <input type="submit">
  </form>
<hr>
<p>ディレクティブ</p>
<ol>
  @foreach($list as $item)
<li>{{$item}}
  @endforeach
</ol>

</body>
</html>
