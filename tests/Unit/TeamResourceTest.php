<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Resources\TeamResource;
use App\Http\Resources\UserResource;
use App\Team;
use App\User;
class TeamResourceTest extends TestCase
{
    /**
     * Returns Correct Data.
     *
     * @return void
     */
    public function test_returns_correct_data()
    {
        $resource = (new TeamResource($team = factory(Team::class)->create()))->jsonSerialize();
        $this->assertArraySubset([
            'id'=>$team->id,
            'name'=>$team->name,
            'logo_uri'=>$team->logo_uri
        ],$resource);

    }
    /**
     * Returns Has User Relationships
     *
     * @return void
     */
    public function test_has_user_relationship()
    {
        $resource = (new TeamResource($team = factory(Team::class)->create([
            'user_id'=>1
        ])))->jsonSerialize();
       $this->assertInstanceOf(UserResource::class,$resource['user']);

    }
    /**
     * Show Secret if User is admin
     *
     * @return void
     */
    public function test_show_secret_if_user_is_admin()
    {
        $resource = (new TeamResource($team = factory(Team::class)->create([
            'user_id'=>1
        ])))->jsonSerialize();
      $this->assertArraySubset([
        'secret' =>'abc'
      ],$resource);

    }
    /**
     * Does not show Secret if User is admin
     *
     * @return void
     */
    public function test_does_not_show_secret_if_user_is_not_admin()
    {
        $resource = (new TeamResource($team = factory(Team::class)->create([
            'user_id'=>2
        ])))->jsonSerialize();
      $this->assertArrayNotHasKey('secret',$resource);

    }

}
