<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    //
    protected $guarded=array('id');

    public static $rules=array(
      'person_id'=>'required',
      'title'=>'required',
      'message'=>'required'
    );

    public function person(){
      return $this->belongsTo('App\Person');
    }

    public function getData(){
      //https://qiita.com/teruis/items/7856671fc9c0a063db23
      return $this->id.':'.$this->person_id.':'.$this->title.':'.$this->message.':'.optional($this->person)->name;
    }

}
