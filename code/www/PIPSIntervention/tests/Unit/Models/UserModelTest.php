<?php

namespace Models;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Mockery;

class UserModelTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;

    public function testgetUsersLastLoginAndFormatReturnsNeverWithANullLastLogin() {
        $user = User::factory()->create();
        $this->assertEquals('Never', User::getUsersLastLoginAndFormat($user));
    }

    public function testgetUsersLastLoginAndFormatReturnsCorrectDateWithAGoodLastLogin() {
        $setDate = date('Y-m-d H:i:s');
        $expected = date('l d F Y', strtotime($setDate)). ' at '
            . date('H:i', strtotime($setDate));
        $user = User::factory()->create([
            'last_login_at' => $setDate,
        ]);
        $this->assertEquals($expected, User::getUsersLastLoginAndFormat($user));
    }

}
