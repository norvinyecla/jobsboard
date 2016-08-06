<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class JobsTest extends TestCase
{
    
    public function testPostJobUrl(){
        $user = $this->generateEmployer();
        $this->actingAs($user)
        ->visit('/jobs/add')
        ->see('Add a New Job');
    }

    public function testAddJob(){
        $user = $this->generateEmployer();
        $this->actingAs($user)
        ->visit('/jobs/add')
        ->type('Developer123', 'title')
        ->type('description', 'description')
        ->type('Manila', 'location')
        ->type('20000', 'salary')
        ->press('Submit')
        ->see('Developer123');
    }

    public function generateEmployer(){
        $user = factory(App\User::class)->create();
        $user->role = "employer";
        return $user;
    }

}
