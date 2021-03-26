@extends('layouts.helloapp')
@section('title','Person.find')
@section('menubar')
@parent
  Personserch page
@endsection


@section('content')

<form action="/laravelapp/public/person/find" method="post">
  {{ csrf_field()}}
  <input type="text" name="input" value="{{$input}}" autofocus>
  <input type="submit" value="find">
</form>
<form action="/person/find" method="post">
  {{ csrf_field()}}
  <input type="text" name="input" value="{{$input}}" autofocus>
  <input type="submit" value="find">
</form>
@if(isset($item))
  {{$item->getData()}}
@endif
@endsection



@section('footer')
copyright 2021.
@endsection
