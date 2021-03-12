<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;


class HelloController extends Controller
{
    //
    /*
    public function index($id='noname',$pass='unknown'){
      return <<< EOF
      <html>
      <head>
      <title>hello index</title>
      </head>
      <body><p>hello controller index action</p></body>
      </html>
      EOF;
    }
    */

//use hello(blade)php
/*
    public function index(){
      $data = ['msg'=>''];
      $list = ['one','two','three'];
      $address = [['name'=>'taro','mail'=>'taro@mail'],['name'=>'hanako','mail'=>'hanako@mail']];
      $message = 'hello';

      //変数を複数渡すにはcompactを使う
      return view('hello.index',compact('data','address','list','message'));
    }
*/

//use Middleware
public function index(Request $request){

  //before middleware
  //return view('hellomiddle.index',['data'=>$request->data]);

  //after middleware
  return view('hellomiddle.index');
}


    public function post(Request $request){
      $msg= $request->msg;
      $data = ['msg'=>'hello : '.$msg];
      $list = ['one','two','three'];
      return view('hello.index',$data,['list'=>$list]);
    }

    public function other(){
      $str = <<<EOD
これはotherです。
EOD;

// 変数を出力
echo $str;
    }
    public function __invoke(){
      $str = <<<EOD
これはinvokeです。<br>
シングルアクションコントローラ
EOD;

// 変数を出力
echo $str;
    }

/*
    public function index(Request $request, Response $response){
      $html = <<<EOD
      {$request}</br>
      {$response}</br>
これはrequest and responseです。
EOD;

      $response->setContent($html);
      return $response;
    }
*/
}
