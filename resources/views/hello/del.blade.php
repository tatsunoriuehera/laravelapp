@extends('layouts.helloapp')

@section('title','Delete')

@section('menubar')

@parent
削除
@endsection

@section('content')

  <form method="POST" action="/laravelapp/public/hello/del">
  {{--<form method="POST" action="/hello">--}}
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{$form->id}}" />
    <input type="text" name="name" value="{{$form->name}}" autofocus>
    <input type-"text" name="mail" value="{{$form->mail}}">
    <input type="text" name="age" value="{{$form->age}}">
    <input type="submit" value="send">
  </form>
@endsection

<hr>
@section('footer')
copyright 2021.
@endsection
