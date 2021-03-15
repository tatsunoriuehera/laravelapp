<?php
//original vaildator

namespace App\Http\Validators;

use Illuminate\Validation\Validator;

class HelloValidator extends Validator
{
  public function validateHello($attribute,$value,$parameters){
    //偶数奇数チェック
    return $value % 2 == 0;
  }
}
