<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'André Snow',
            'email' => 'andre@teste.com',
            'email_verified_at' => now(),
            'password' => bcrypt(12345678),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
