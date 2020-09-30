<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        //-------------------------------------------------
        // Developer
        //-------------------------------------------------
        $user = User::create([
            'firstname'         => 'Ben-Piet',
            'lastname'          => 'O\'Callaghan',
            'cellphone'         => '123456789',
            'email'             => 'bpocallaghan@gmail.com',
            'gender'            => 'ninja',
            'password'          => bcrypt('ben'),
            'email_verified_at' => now()
        ]);
        // $user->syncRoles([
        //     Role::$ADMIN,
        //     Role::$DEVELOPER,
        // ]);
        $this->addAllRolesToUser($user);

        //-------------------------------------------------
        // GITHUP - PREVIEW
        //-------------------------------------------------
        $user = User::create([
            'firstname'         => 'Admin',
            'lastname'          => 'Github',
            'cellphone'         => '123456789',
            'email'             => 'github@bpocallaghan.co.za',
            'gender'            => 'male',
            'password'          => bcrypt('github'),
            'email_verified_at' => now()
        ]);
        $this->addAllRolesToUser($user);
    }

    /**
     * Add all the roles to the user
     * @param $user
     */
    private function addAllRolesToUser($user)
    {
        $roles = Role::all()->pluck('keyword', 'id')->values();

        $user->syncRoles($roles);
    }
}
