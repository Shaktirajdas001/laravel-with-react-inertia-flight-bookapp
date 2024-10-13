<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::truncate();
        $admin = [
            'name' => "Super Admin",
            'email' => "superadmin@booking.com",
            'password' => Hash::make('12345678'),
           
            'user_type' => 'admin',
            
        ];
        $user_admin = User::create($admin);
        
    }
}
