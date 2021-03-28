<?php
//Person Model

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Person extends Model
{
    //
    public function getData(){
      return $this->id.':'.$this->name.':'.$this->mail.':'.$this->age;
    }
    public function scopeNameEqual($query,$str){
      return $query->where('name',$str);
    }

    public function scopeAgeGreaterThan($query,$n){
      return $query->where('age','>=',$n);
    }

    public function scopeAgeLessThan($query,$n){
      return $query->where('age','<=',$n);
    }

    //global scope
    protected static function boot(){
      parent::boot();
      static::addGlobalScope('age',function (Builder $builder){
        $builder->where('age','>',40);
      });
    }

    protected $guarded=array('id');
    public static $rules=array(
      'name'=>'required',
      'mail'=>'email',
      'age'=>'integer|min:0|max:150',
    );
    //https://teratail.com/questions/110860
    //https://toriyaru.com/2019/09/26/laravel%E3%81%AE%E3%83%A2%E3%83%87%E3%83%AB%E3%82%92%E4%BD%BF%E3%81%A3%E3%81%9F%E3%82%A4%E3%83%B3%E3%82%B5%E3%83%BC%E3%83%88%E3%81%A7sqlstatehy000%E3%81%8C%E7%99%BA%E7%94%9F/
    public $timestamps = false;

}
