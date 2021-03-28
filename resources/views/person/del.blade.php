@extends('layouts.helloapp')
@section('title','Person.delete')
@section('menubar')
@parent
  Person_delete page
@endsection

@section('content')
<form class="" action="/laravelapp/public/person/del" method="post">
  {{csrf_field()}}
  <input type="hidden" name="id" value="{{$form->id}}">
  {{$form->name}}{{$form->mail}}{{$form->age}}
  <input type="submit" name="" value="send">
</form>
@endsection

@section('footer')
copyright 2021.
@endsection
