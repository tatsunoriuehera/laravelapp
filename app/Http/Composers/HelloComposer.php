<?php

namespace App\Http\Composers;
use Illuminate\View\View;

class HelloComposer{
  public function compose(View $view){
    //getName()で表示しているビュー名を取得
    $view->with('view_message','this view is :'.$view->getName());
  }
}
