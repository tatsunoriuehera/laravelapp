@extends('layouts.helloapp')
@section('title','Board.add')
@section('menubar')
@parent
  Board_add page
@endsection

@section('content')
<form class="" action="/laravelapp/public/board/add" method="post">
  {{csrf_field()}}
  <label for="">person_id</label>
  <input type="number" name="person_id" value="">
  <label for="">title</label>
  <input type="text" name="title" value="">
  <label for="">message</label>
  <input type="text" name="message" value="">
  <input type="submit" name="" value="send">
</form>
@endsection

@section('footer')
copyright 2021.
@endsection
