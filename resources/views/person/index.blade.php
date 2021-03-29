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

@foreach($hasItems as $item)
  <tr><td>{{$item->getData()}}</td>
      <td>

        {{--
        @if($item->boards!=null)

            {{$item->board->getData()}}
        --}}

        <table with="100%">
        @foreach($item->boards as $obj)
        <tr><td>{{$obj->getData()}}</td></tr>
        @endforeach
        </table>
        {{--@endif--}}
      </td>
  </tr>
@endforeach
</table>

<table>
  <tr>
    <th>person</th>
  </tr>
  @foreach($noItems as $item)
  <tr>
    <td>{{$item->getData()}}</td>
  </tr>
  @endforeach
</table>
@endsection


@section('footer')
copyright 2021.
@endsection
