@extends('layouts.helloapp')
@section('title','Person.index')
@section('menubar')
@parent
  Personindex page
@endsection

@section('content')
<table border="1">

{{--
@foreach($items as $item)
<tr>
  <td>{{$item->name}}</td>
  <td>{{$item->mail}}</td>
  <td>{{$item->age}}</td>
</tr>
@endforeach
--}}
@foreach($items as $item)
  <tr><td>{{$item->getData()}}</td></tr>
@endforeach
</table>
@endsection


@section('footer')
copyright 2021.
@endsection
