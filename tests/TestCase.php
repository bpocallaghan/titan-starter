<?php

namespace Tests;

use App\Models\Role;
use App\Models\User;
use Database\Seeders\NavigationsTableSeeder;
use Database\Seeders\RolesTableSeeder;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $loginPath = '/auth/login';

    /**
     * Seed the Database
     */
    protected function setUpDatabase(): void
    {
        $this->seed();
    }

    private function seedRolesAndNavigation(): void
    {
        $this->seed(RolesTableSeeder::class);
        $this->seed(NavigationsTableSeeder::class);
    }

    /**
     * Sign user in
     * @param null $user
     * @return mixed|null
     */
    protected function signIn($user = null)
    {
        $user = $user ?: User::factory()->create();

        $this->actingAs($user);

        $user->update([
            'logged_in_at' => now()
        ]);

        return $user;
    }

    /**
     * Seed the roles and navigation tables
     * Create user and assign developer roles
     * Sign the user in
     * @return mixed|null
     */
    protected function signInAdmin()
    {
        $this->seedRolesAndNavigation();

        $user = User::factory()->create();
        $user->syncRoles([
            Role::$USER,
            Role::$ADMIN,
            Role::$ADMIN_NOTIFY,
            Role::$DEVELOPER
        ]);

        $user = $this->signIn($user);

        return $user;
    }
}
