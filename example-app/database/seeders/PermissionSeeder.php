<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define permissions
        $permissions = [
            'create user', 'edit user', 'delete user',
            'create profile', 'edit profile', 'delete profile',
            'submit profile', 'approve profile', 'reject profile',
            'view profile',
            'view profileSubmit 1', 'view profileSubmit 2',
        ];

        // Create permissions
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create Admin user and assign permissions
        $admin = User::create([
            'name' => 'Admin',
            'studentId' => '0000000000',
            'birth' => null,
            'gender' => null,
            'course' => null,
            'major' => null,
            'phone' => null,
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $admin->givePermissionTo(['create user', 'edit user', 'delete user']);

        // Create Student user and assign permissions
        $student = User::create([
            'name' => 'Student',
            'studentId' => '1111111111',
            'birth' => null,
            'gender' => null,
            'course' => null,
            'major' => null,
            'phone' => null,
            'email' => 'student@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $student->givePermissionTo(['create profile', 'edit profile', 'delete profile', 'submit profile']);

        // Create Teacher1 user and assign permissions
        $teacher1 = User::create([
            'name' => 'Liên chi',
            'studentId' => '2222222222',
            'birth' => null,
            'gender' => null,
            'course' => null,
            'major' => null,
            'phone' => null,
            'email' => 'lienchi@gmail.com',
            'password' => Hash::make('123123123'),
        ]);
        $teacher1->givePermissionTo(['edit profile', 'submit profile', 'view profileSubmit 1','approve profile', 'reject profile']);

        // Create Teacher2 user and assign permissions
        $teacher2 = User::create([
            'name' => 'Hội đồng',
            'studentId' => '3333333333',
            'birth' => null,
            'gender' => null,
            'course' => null,
            'major' => null,
            'phone' => null,
            'email' => 'hoidong@gmail.com',
            'password' => Hash::make('123123123'),
        ]);
        $teacher2->givePermissionTo(['edit profile', 'submit profile', 'view profileSubmit 2','approve profile', 'reject profile']);
    }
}
