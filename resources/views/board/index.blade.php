@extends('layouts.helloapp')
@section('title','Board.index')
@section('menubar')
@parent
  Board_index page
@endsection

<ul>
@section('content')

  @foreach($items as $item)
  <li>{{$item->getData()}}</li>
  @endforeach
{{--
@foreach($items as $item)
{{$item->message}}{{$item->person->name}}
@endforeach
--}}  
@endsection
</ul>


@section('footer')
copyright 2021.
@endsection
