<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HelloRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      if($this->path()=='hello'){
        return true;
      }
      else{
        return false;
      }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'name'=>'required',
            'mail'=>'email',
            'age'=>'numeric|hello',
        ];
    }

    public function messages()
    {
      return[
        'name.required'=>'名前は必須項目です。',
        'mail.email'=>'メールアドレスを入力してください。',
        'age.between'=>'年齢は０から１５０までの数字で入力してください。',
        'age.hello'=>'年齢は偶数で入力',
      ];
    }
}
