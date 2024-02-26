<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            ['name' => 'Ahmed Ali', 'email' => 'admin@dentnotes.com', 'password' => bcrypt('secret'), 'role_id' => '1', 'avatar' => '/assets/images/avatar/avatar.jpg'],
            ['name' => 'Justin Timberlake', 'email' => 'user@dentnotes.com', 'password' => bcrypt('secret'), 'role_id' => '2', 'avatar' => '/assets/images/avatar/avatar.jpg'],
            ['name' => 'Benjamin Linus', 'email' => 'linus@dentnotes.com', 'password' => bcrypt('secret'), 'role_id' => '2', 'avatar' => '/assets/images/avatar/avatar.jpg']
        ]);

    }
}
