@extends('layouts.helloapp')
@section('title','index')
@section('menubar')
@parent
  index page
@endsection

@section('content')
  <p>this is main contents</p>

  {{-- use middleware --}}
  {{--
  <table>
    @foreach($data as $item)
    <tr>
      <th>
        {{$item['name']}}
      </th>
      <td>
        {{$item['mail']}}
      </td>
    </tr>
    @endforeach
  </table>
  --}}
  <p>this is<middleware>google.com</middleware> to link</p>

@endsection

@section('footer')
copyright 2021.
@endsection
