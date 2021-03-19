@extends('layouts.helloapp')

@section('title','Add')

@section('menubar')

@parent
新規作成
@endsection

@section('content')

  <form method="POST" action="/laravelapp/public/hello/add">
  {{--<form method="POST" action="/hello">--}}
    {{-- csr対策 --}}
    {{ csrf_field() }}
    <input type="text" name="name" autofocus>
    <input type-"text" name="mail">
    <input type="text" name="age">
    <input type="submit" value="send">
  </form>
@endsection

<hr>
@section('footer')
copyright 2021.
@endsection
