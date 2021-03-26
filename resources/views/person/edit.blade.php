@extends('layouts.helloapp')
@section('title','Person.edit')
@section('menubar')
@parent
  Person_edit page
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
  <form class="" action="/laravelapp/public/person/edit" method="post">
    {{csrf_field()}}
    <input type="hidden" name="id" value="{{$form->id}}">
    <input type="text" name="name" value="{{$form->name}}">
    <input type="text" name="mail" value="{{$form->mail}}">
    <input type="number" name="age" value="{{$form->age}}">
    <input type="submit" name="" value="send">
  </form>
</table>
@endsection

@section('footer')
copyright 2021.
@endsection
