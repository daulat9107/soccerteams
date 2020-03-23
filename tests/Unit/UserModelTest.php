<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class UserModelTest extends TestCase
{
    /**
     * Test user has a role
     *
     * @return void
     */
    public function test_admin_user_has_role(){
    	$user=User::find(1);
        $this->assertTrue($user->hasRole('admin'));
    }
    /**
     * Test user has atleast one role
     *
     * @return void
     */
    public function test_admin_user_has_atleast_one_role(){
		$user=User::find(1);
        $this->assertTrue($user->hasRole('admin','user'));
    }
    /**
     * Test user has permission to add team
     *
     * @return void
     */
    public function test_admin_user_has_permission_to_add_team(){
    	$user=User::find(1);
    	$this->assertTrue($user->can('add team'));
    }
}
