<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Team;
use App\User;
class TeamModelTest extends TestCase
{
    /**
     * A user can add team
     *
     * @return void
     */
    public function test_user_can_add_team()
    {
    	$user=User::find(1);
    	$this->assertTrue($user->can('add team'));
       
    }
    /**
     * A user can not add team
     *
     * @return void
     */
    public function test_user_can_not_add_team()
    {
    	$user=User::find(2);
    	$this->assertFalse($user->can('add team'));
       
    }
}
