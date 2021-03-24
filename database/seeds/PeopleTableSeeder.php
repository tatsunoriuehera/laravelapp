<?php

use Illuminate\Database\Seeder;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $param=['name'=>'taro',
      'mail'=>'taro@mail',
      'age'=>'12',
      ];
      DB::table('people')->insert($param);

      $param=['name'=>'jiro',
      'mail'=>'jiro@mail',
      'age'=>'24',
      ];
      DB::table('people')->insert($param);
      $param=['name'=>'hanako',
      'mail'=>'hanako@mail',
      'age'=>'34',
      ];
      DB::table('people')->insert($param);
      $param=['name'=>'sachiko',
      'mail'=>'sachi@mail',
      'age'=>'48',
      ];
      DB::table('people')->insert($param);
    }
}
