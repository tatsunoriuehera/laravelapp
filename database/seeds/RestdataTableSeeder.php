<?php

use Illuminate\Database\Seeder;
use App\Restdata;

class RestdataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $param=[
        'message'=>'google',
        'url'=>'google',
        ];
        $restdata=new Restdata;
        $restdata->fill($param)->save();
        $param=[
        'message'=>'yahoo',
        'url'=>'yahoo',
        ];
        $restdata=new Restdata;
        $restdata->fill($param)->save();
        $param=[
        'message'=>'MSN',
        'url'=>'msn',
        ];
        $restdata=new Restdata;
        $restdata->fill($param)->save();
      }
  }
