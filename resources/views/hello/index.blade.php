{{--
<html>
<head>
<link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>
<body>

  <h1>Blade</h1>

  @if($msg!='')
  <p>{{$msg}}</p>
  @else
  <p>please input name</p>
  @endif


<hr>

<p>ディレクティブ</p>
<ol>
{{--  @foreach($list as $item) --}}
<li>{{-- {{$item}}--}}
  {{--  @endforeach --}}
</ol>

</body>
</html>
--}}

@extends('layouts.helloapp')
@section('title','index')
@section('menubar')
@parent
  index page
@endsection

@section('content')
  <p>this is main contents</p>
{{-- from messaga.blade.php --}}
  @component('components.message')
  @slot('msg_title')
  CAUTION!
  @endslot

  @slot('msg_content')
  this is message
  @endslot
  @endcomponent

  @include('components.message',['msg_title'=>'OK','msg_content'=>'this is sub view'])

  {{-- from item.blade.php --}}
  {{--  @each('components.item',$address,'item')

  {{-- provider --}}
  <p>{{--  controller value:'message'={{$message}} --}}</p>
  <p>{{--  viewcomposer value:'view_message'={{$view_message}} --}}</p>

  {{-- バリデーション --}}
  <p>{{-- {{$msg}} --}}</p>

  <form method="POST" action="/laravelapp/public/hello">
  {{--<form method="POST" action="/hello">--}}
    {{-- csr対策 --}}
    {{ csrf_field() }}
    @if($errors->has('name'))
    {{$errors->first('name')}}
    @endif
    <input type="text" name="name" value="{{old('name')}}">
    @if($errors->has('mail'))
    {{$errors->first('mail')}}
    @endif
    <input type="text" name="mail" value="{{old('mail')}}">
    @if($errors->has('age'))
    {{$errors->first('age')}}
    @endif
    <input type="text" name="age" value="{{old('age')}}">
    <input type="submit" value="send">
  </form>

  {{-- {{$msg}} --}}
  @if(count($errors)>0)
  <p>caution</p>
  @endif
  <form method="POST" action="/laravelapp/public/hello">
    {{ csrf_field() }}
    @if($errors->has('msg'))
    <p>error</p>{{$errors->first('msg')}}
    @endif
    message:<input type="text" name="msg" value="{{old('msg')}}" />
    <input type="submit" value="send" />
  </form>

    <table>
    @foreach($items as $item)
    <tr><td>{{$item->id}}</td><td>{{$item->name}}</td><td>{{$item->mail}}</td><td>{{$item->age}}</td>
    @endforeach
  </table>
@endsection

@section('footer')
copyright 2021.
@endsection
