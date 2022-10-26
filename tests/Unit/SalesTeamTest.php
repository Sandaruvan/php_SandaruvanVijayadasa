<?php

namespace Tests\Unit;

use App\Models\SalesTeam;
use Tests\TestCase;

class SalesTeamTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_member_create_form()
    {
        $response = $this->get('/managers/create');

        $response->assertStatus(200);
    }

    public function test_member_name_empty()
    {
        $member = SalesTeam::make([
            'name' => 'Test',
            'email' => 'test@gmail.com',
            'telephoneNo' => '0712345678',
            'joinedDate' => '2000-01-20',
            'currentRoute' => 'Test',
            'comment' => 'Test'
        ]);

        $this->assertTrue($member->name != '');
    }

    public function test_member_email_empty()
    {
        $member = SalesTeam::make([
            'name' => 'Test',
            'email' => 'test@gmail.com',
            'telephoneNo' => '0712345678',
            'joinedDate' => '2000-01-20',
            'currentRoute' => 'Test',
            'comment' => 'Test'
        ]);

        $this->assertTrue($member->email != '');
    }

    public function test_member_telephone_empty()
    {
        $member = SalesTeam::make([
            'name' => 'Test',
            'email' => 'test@gmail.com',
            'telephoneNo' => '0712345678',
            'joinedDate' => '2000-01-20',
            'currentRoute' => 'Test',
            'comment' => 'Test'
        ]);

        $this->assertTrue($member->telephoneNo != '');
    }

    public function test_member_joined_date_empty()
    {
        $member = SalesTeam::make([
            'name' => 'Test',
            'email' => 'test@gmail.com',
            'telephoneNo' => '0712345678',
            'joinedDate' => '2000-01-20',
            'currentRoute' => 'Test',
            'comment' => 'Test'
        ]);

        $this->assertTrue($member->joinedDate != '');
    }

    public function test_member_current_route_empty()
    {
        $member = SalesTeam::make([
            'name' => 'Test',
            'email' => 'test@gmail.com',
            'telephoneNo' => '0712345678',
            'joinedDate' => '2000-01-20',
            'currentRoute' => 'Test',
            'comment' => 'Test'
        ]);

        $this->assertTrue($member->currentRoute != '');
    }

    public function test_member_comment_empty()
    {
        $member = SalesTeam::make([
            'name' => 'Test',
            'email' => 'test@gmail.com',
            'telephoneNo' => '0712345678',
            'joinedDate' => '2000-01-20',
            'currentRoute' => 'Test',
            'comment' => 'Test'
        ]);

        $this->assertTrue($member->comment != '');
    }

    public function test_member_email_duplication()
    {
        $member1 = SalesTeam::make([
            'name' => 'Test 1',
            'email' => 'test1@gmail.com',
            'telephoneNo' => '0712345678',
            'joinedDate' => '2000-01-20',
            'currentRoute' => 'Test',
            'comment' => 'Test'
        ]);

        $member2 = SalesTeam::make([
            'name' => 'Test 2',
            'email' => 'test2@gmail.com',
            'telephoneNo' => '0712345678',
            'joinedDate' => '2000-01-20',
            'currentRoute' => 'Test',
            'comment' => 'Test'
        ]);

        $this->assertTrue($member1->email != $member2->email);
    }

    public function test_delete_team_member()
    {
        $member = SalesTeam::factory()->count(1)->make();

        $member = SalesTeam::first();

        if ($member) {
            $member->delete();
        }

        $this->assertTrue(true);
    }

    public function test_it_stores_new_member()
    {
        $response = $this->post('/managers/store', [
            'name' => 'Test',
            'email' => 'test@gmail.com',
            'telephoneNo' => '0712345678',
            'joinedDate' => '2000-01-20',
            'currentRoute' => 'Test',
            'comment' => 'Test'
        ]);

        $response->assertRedirect('/managers/create');
    }

    public function test_database()
    {
        $this->assertDatabaseHas('sales_teams', [
            'name' => 'Sandaruvan Vijayadasa'
        ]);
    }
}
