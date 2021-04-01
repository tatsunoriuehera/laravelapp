@extends('layouts.helloapp')
@section('title','auth')
@section('menubar')
@parent
  auth page
@endsection

@section('content')
<p>{{$message}}</p>
<form class="" action="/laravelapp/public/hello/auth" method="post">
  {{csrf_field()}}
  <label for="">email:</label>
  <input type="text" name="email" value="">
  <label for="">password:</label>
  <input type="password" name="password" value="">
  <input type="submit" name="" value="send">
</form>
@endsection


@section('footer')
copyright 2021.
@endsection
