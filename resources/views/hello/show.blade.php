@extends('layouts.helloapp')

@section('title','Show')

@section('menubar')

@parent
詳細
@endsection

@section('content')
  @if($items!=null)
  @foreach($items as $item)
  <table>
    <tr><td>{{$item->id}}</td></tr>
    <tr><td>{{$item->name}}</td></tr>
    <tr><td>{{$item->mail}}</td></tr>
    <tr><td>{{$item->age}}</td></tr>
  </table>
  @endforeach
  @endif
@endsection

<hr>
@section('footer')
copyright 2021.
@endsection
