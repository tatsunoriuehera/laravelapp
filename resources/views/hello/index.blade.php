{{--
<html>
<head>
<link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>
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
--}}

@extends('layouts.helloapp')
@section('title','index')
@section('menubar')
@parent
  index page
@endsection

@section('content')
  <p>this is main contents</p>
{{-- from messaga.blade.php --}}
  @component('components.message')
  @slot('msg_title')
  CAUTION!
  @endslot

  @slot('msg_content')
  this is message
  @endslot
  @endcomponent

  @include('components.message',['msg_title'=>'OK','msg_content'=>'this is sub view'])

{{-- from item.blade.php --}}
  @each('components.item',$address,'item')
@endsection

@section('footer')
copyright 2021.
@endsection
