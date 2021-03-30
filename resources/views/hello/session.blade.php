@extends('layouts.helloapp')

@section('title','session')

@section('menubar')

@parent
session_page
@endsection

@section('content')
<p>{{$session_data}}</p>
<form class="" action="/laravelapp/public/hello/session" method="post">
  {{csrf_field()}}
  <input type="text" name="input" value="">
  <input type="submit" name="" value="send">
</form>
@endsection

<hr>
@section('footer')
copyright 2021.
@endsection
