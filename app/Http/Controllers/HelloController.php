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

    public function index(){
      $data = ['msg'=>''];
      $list = ['one','two','three'];
      $address = [['name'=>'taro','mail'=>'taro@mail'],['name'=>'hanako','mail'=>'hanako@mail']];
      return view('hello.index',$data,['list'=>$list],['address'=>$address]);
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
