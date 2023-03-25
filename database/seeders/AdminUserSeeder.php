<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = [
            [
                "name" => "Admin Laracamp",
                "email" => "admin@test.com",
                "password" => bcrypt("testing1234"),
                "is_admin" => true,
                "occupation" => "Admin Laracamp",
                "created_at" => date('Y-m-d H:i:s', time()),
                "updated_at" => date('Y-m-d H:i:s', time())
            ]
        ];

        User::insert($admin);
    }
}
