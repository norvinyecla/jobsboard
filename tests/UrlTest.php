<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UrlTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->visit('/')
         ->click('Login')
         ->seePageIs('/login');
    }

    public function testUserLogin()
	{
    	$this->visit('/login')
         ->type('boss@gmail.com', 'email')
         ->type('123456', 'password')
         ->press('Login')
         ->seePageIs('/')
         ->see('Post Job');
	}

	public function testPostJobUrl(){
		$user = factory(App\User::class)->create();
		$user->role = "employer";

		$this->actingAs($user)
		->visit('/jobs/add')
		->see('Add a New Job');
	}

	public function testUserLogout()
	{
    	$this->visit('/logout')
    	->seePageIs('/')
        ->see('Login');
	}
}
