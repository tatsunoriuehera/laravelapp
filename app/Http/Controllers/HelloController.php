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

use App\Person;

//add auth
use Illuminate\Support\Facades\Auth;


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
  /*
  if(isset($request->id)){
    $param=['id'=>$request->id];
    $items=DB::select('select * from people where id = :id',$param);
  }else{
    $items=DB::select('select * from people');
  }
  */

  //page nation
  /*
  $items=DB::table('people')->simplePaginate(5);
  return view('hello.index',['items'=>$items]);
  */
  //sort
  /*
  $sort=$request->sort;
  $items=Person::orderBy($sort,'asc')->paginate(5);
  $param=['items'=>$items,'sort'=>$sort];
  return view('hello.index',$param);
  */
  //Auth
  $user=Auth::user();
  $sort=$request->sort;
  $items=Person::orderBy($sort,'asc')->simplePaginate(5);
  $param=['items'=>$items,'sort'=>$sort,'user'=>$user];
  return view('hello.index',$param);
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
    /*
    DB::insert('insert into people (name,mail,age) values (:name,:mail,:age)', $param);
    */
    DB::table('people')->insert($param);
    return redirect('/hello');
  }

  public function edit(Request $request){
    /*
    $param=['id'=>$request->id];
    $item=DB::select('select * from people where id=:id',$param);
    return view('hello.edit',['form'=>$item[0]]);
    */
    $item=DB::table('people')->where('id',$request->id)->first();
    return view('hello.edit',['form'=>$item]);
  }

  //update
  public function update(Request $request){
    /*
    $param=[
      'id'=>$request->id,
      'name'=>$request->name,
      'mail'=>$request->mail,
      'age'=>$request->age,
    ];
    DB::update('update people set name=:name,mail=:mail,age=:age where id=:id',$param);
    */
    $param=[
      'name'=>$request->name,
      'mail'=>$request->mail,
      'age'=>$request->age,
    ];
    DB::table('people')->where ('id',$request->id)->update($param);
    return redirect('/hello');
  }

  public function del(Request $request){
    /*
    $param=['id'=>$request->id];
    $item=DB::select('select * from people where id=:id',$param);
    return view('hello.del',['form'=>$item[0]]);
    */
    $item=DB::table('people')->where ('id',$request->id)->first();
    return view('hello.del',['form'=>$item]);
  }

  //delete
  public function remove(Request $request){
    /*
    $param=['id'=>$request->id];
    DB::delete('delete from people where id=:id',$param);
    */
    DB::table('people')->where('id',$request->id)->delete();
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

  //restful
  public function rest(Request $request){
    return view('hello.rest');
  }

  //session
  public function ses_get(Request $request){
    $sesdata=$request->session()->get('msg');
    return view('hello.session',['session_data'=>$sesdata]);
  }

  public function ses_put(Request $request){
    $msg=$request->input;
    $request->session()->put('msg',$msg);
    return redirect('hello/session');
  }

  //auth
  public function getAuth(Request $request){
    $param=['message'=>'pleage login'];
    return view('hello.auth',$param);
  }

  public function postAuth(Request $request){
    $email=$request->email;
    $password=$request->password;
    if(Auth::attempt(['email'=>$email,'password'=>$password])){
      $msg='login complete:'.Auth::user()->name;
    }
    else{
      $msg='login error';
    }
    return view('hello.auth',['message'=>$msg]);
  }

}
