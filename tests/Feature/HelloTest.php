<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;
use App\Person;

class HelloTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
     /*
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    public function testHello(){
      $this->assertTrue(true);
      $arr=[];
      $this->assertEmpty($arr);
      $msg="hello";
      $this->assertEquals('hello',$msg);
      $n=random_ini(0,100);
      $this->assertLessThan(100,$n);
    }
    */
    use DatabaseMigrations;
    public function testHello(){
      /*
      $this->assertTrue(true);
      $response=$this->get('/');
      $response->assertStatus(200);
      $response=$this->get('/hello');
      $response->assertStatus(302);
      $user=factory(User::class)->create();
      $response=$this->actingAs($user)->get('/hello');
      $response->assertStatus(200);
      $response=$this->get('/no_route');
      $response->assertStatus(404);
      */
      factory(User::class)->create([
      'name'=>'aaa',
      'email'=>'bbb@ccc.com',
      'password'=>'abcabc',
      ]);
      factory(User::class,10)->create();
      $this->assetDatabaseHas('users',[
      'name'=>'aaa',
      'email'=>'bbb@ccc.com',
      'password'=>'abcabc',
      ]);

      factory(Person::class)->create([
      'name'=>'xxx',
      'mail'=>'yyy@zzz.com',
      'age'=>'100',
      ]);
      factory(Person::class,10)->create();
      $this->assetDatabaseHas('people',[
      'name'=>'xxx',
      'mail'=>'yyy@zzz.com',
      'age'=>'100',
      ]);
    }
}
