<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'admin']);
        $authorRole = Role::create(['name' => 'author']);
        $viewerRole = Role::create(['name' => 'viewer']);

        $userAdmin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('adminuhuy'),
        ]);
        $userAuthor = User::create([
            'name' => 'Author',
            'email' => 'author@gmail.com',
            'password' => bcrypt('authoruhuy'),
        ]);
        $userViewer = User::create([
            'name' => 'Viewer',
            'email' => 'viewer@gmail.com',
            'password' => bcrypt('vieweruhuy'),
        ]);

        $userAdmin->assignRole($adminRole);
        $userAuthor->assignRole($authorRole);
        $userViewer->assignRole($viewerRole);
    }
}
