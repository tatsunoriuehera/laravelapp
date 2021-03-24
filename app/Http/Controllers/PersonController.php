<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    //
    public function index(Request $request){
      $items=Person::all();
      return view ('person.index',['items'=>$items]);
    }

    public function find(Request $request){
      return view('person.find',['input'=>'']);
    }

    public function search(Request $request){
      $item=Person::find($request->input);
      //$item=Person::where('name', $request->input)->first();
      //$item=Person::nameEqual($request->input)->first();
      /*
      $min=$request->input*1;
      $max=$min+10;
      $item=Person::ageGreatherThan($min)->scopeAgeLessThan($max)->first();
      */
      $param=['input'=>$request->input,'item'=>$item];
      return view('person.find',$param);
    }
}
