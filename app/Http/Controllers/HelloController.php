<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

//バリデーション
use App\Http\Requests\HelloRequest;

//バリデータ
use Validator;


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
  //return view('hellomiddle.index','msg'=>'please input form:');

  /*
  $validator=Validator::make($request->query(),[
    'id'=>'required',
    'pass'=>'required',
  ]);
  if($validator->fails()){
    $msg='query exception';
  }else{
  */
    $msg='ID PASS OK: please input form';

  //}

  return view('hello.index',['msg'=>$msg,]);
}


    public function post(HelloRequest $request){
      //$validate_rule=[
        //'name'=>'required',
        //'mail'=>'email',
        //'age'=>'numeric|between:0,150',
      //];
      //$this->validate($request,$validate_rule);
      /*
      $validator=Validator::make($request->all(),[
        'name'=>'required',
        'email'=>'email',
        'age'=>'numeric|between:0,150'
      ]);
      if($validator->fails()){
        return redirect('/hello')
        ->withErrors($validator)
        ->withInput();
      }
      return view('hello.index',['msg'=>'input is complete']);
      */
      /*
      $rules=[
        'name'=>'required',
        'mail'=>'email',
        'age'=>'numeric|between:0,150',
      ];
      $messages=[
        'name.required'=>'名前は必ず入力',
        'mail.email'=>'メールアドレスが必要',
        'age.numeric'=>'年齢を整数で',
      ];
      $validator=Validator::make($request->all(),$rules,$messages);
      if($validator->fails()){

      return redirect('/hello')
      ->withErrors($validator)
      ->withInput();
    }
    */
    return view('hello.index',['msg'=>'mission complete']);
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
