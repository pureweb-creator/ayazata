<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         $admin = User::create([
             'name' => 'Admin',
             'email' => 'admin@ayazata.com'
         ]);

         Role::create(['name'=>'admin']);
         $admin->assignRole(['admin']);
    }
}
