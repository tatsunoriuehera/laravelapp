<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

//バリデーション
use App\Http\Requests\HelloRequest;

//バリデータ
use Validator;

//conn database
use Illuminate\Support\Facades\DB;


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
  //}
  //  $msg='ID PASS OK: please input form';
  /*
  if($request->hasCookie('msg')){
    $msg= 'Cookie:'.$request->cookie('msg');
  }else{
    $msg='no cookie';
  }
  return view('hello.index',['msg'=>$msg,]);
  */
  if(isset($request->id)){
    $param=['id'=>$request->id];
    $items=DB::select('select * from people where id = :id',$param);
  }else{
    $items=DB::select('select * from people');
  }
  return view('hello.index',['items'=>$items]);
}


    public function post(Request $request){
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

    //$msg = '';
    //return view('hello.index',['msg'=>'mission complete']);

/*
    $validate_rule=['msg'=>'required',];
    $this->validate($request,$validate_rule);
    $msg = $request->msg;
    $response=new Response(view('hello.index',['msg'=>$msg]));
    $response->cookie('msg',$msg,100);
    return $response;
    */

    //SQL
    //$items=DB::select('select * from people');
    //query builder
    $items=DB::table('people')->get();
    return view('hello.index',['items'=>$items]);
  }
/*
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


    //public function index(Request $request, Response $response){
      //$html = <<<EOD
      //{$request}</br>
      //{$response}</br>
//これはrequest and responseです。
//EOD;

  //    $response->setContent($html);
    //  return $response;
    //}

*/
  public function add(Request $request){
    return view('hello.add');
  }

  //insert
  public function create(Request $request){
    $param=[
    'name'=>$request->name,
    'mail'=>$request->mail,
    'age'=>$request->age,
    ];
    DB::insert('insert into people (name,mail,age) values (:name,:mail,:age)', $param);
    return redirect('/hello');
  }

  public function edit(Request $request){
    $param=['id'=>$request->id];
    $item=DB::select('select * from people where id=:id',$param);
    return view('hello.edit',['form'=>$item[0]]);
  }

  //update
  public function update(Request $request){
    $param=[
      'id'=>$request->id,
      'name'=>$request->name,
      'mail'=>$request->mail,
      'age'=>$request->age,
    ];
    DB::update('update people set name=:name,mail=:mail,age=:age where id=:id',$param);
    return redirect('/hello');
  }

  public function del(Request $request){
    $param=['id'=>$request->id];
    $item=DB::select('select * from people where id=:id',$param);
    return view('hello.del',['form'=>$item[0]]);
  }

  //delete
  public function remove(Request $request){
    $param=['id'=>$request->id];
    DB::delete('delete from people where id=:id',$param);
    return redirect('/hello');
  }

  public function show(Request $request){
    /*
    $id=$request->id;
    $items=DB::table('people')-> where('id','<=',$id)->get();
    */
    /*
    $name=$request->name;
    $items=DB::table('people')
    -> where('name','like','%'.$name.'%')
    -> orwhere('mail','like','%'.$name.'%')->get();
    */
    /*
    $min=$request->min;
    $max=$request->max;
    $items=DB::table('people')
    -> whereRaw('age>=? and age<=?',[$min,$max])->get();
    */
    /*
    $items=DB::table('people')-> orderBy('age','desc')->get();
    */
    $page=$request->page;
    $items=DB::table('people')
    ->offset($page * 3)
    ->limit(2)
    ->get();
    return view('hello.show',['items'=>$items]);


  }

}
