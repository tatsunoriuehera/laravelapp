@extends('layouts.helloapp')
@section('title','Person.add')
@section('menubar')
@parent
  Person_add page
@endsection

@section('content')
@if(count($errors)>0)
<div>
  <ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </ul>
</div>
@endif
<table>
  <form class="" action="/laravelapp/public/person/add" method="post">
    {{csrf_field()}}
    <input type="text" name="name" value="{{old('name')}}">
    <input type="text" name="mail" value="{{old('mail')}}">
    <input type="number" name="age" value="{{old('age')}}">
    <input type="submit" name="" value="send">
  </form>
</table>
@endsection

@section('footer')
copyright 2021.
@endsection
