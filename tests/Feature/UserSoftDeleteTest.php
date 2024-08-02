<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class UserSoftDeleteTest extends TestCase
{

    /** @test */
    public function it_can_soft_delete_a_user()
    {
        $user = User::find('2');
        $user->delete();
    }
}
