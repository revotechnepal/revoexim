<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        User::insert([
            [
                'name'            => 'Mr. Admin',
                'email'           => 'admin@admin.com',
                'password'        => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role_id'         => 1,
                'remember_token'  => Str::random(10),
                'created_at'      => date("Y-m-d H:i:s")
            ],
            [
                'name'            => 'Mr. Editor',
                'email'           => 'editor@editor.com',
                'password'        => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role_id'         => 2,
                'remember_token'  => Str::random(10),
                'created_at'      => date("Y-m-d H:i:s")
            ],
            [
                'name'            => 'Mr. User',
                'email'           => 'user@user.com',
                'password'        => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role_id'         => 3,
                'remember_token'  => Str::random(10),
                'created_at'      => date("Y-m-d H:i:s")
            ]
        ]);

        Role::insert([
            ['name' => 'Admin', 'slug' => 'admin'],
            ['name' => 'Editor','slug' => 'editor'],
            ['name' => 'User',  'slug' => 'user']
        ]);
        $this->call(ServiceTableSeeder::class);
        $this->call(TeamTableSeeder::class);
        $this->call(TestimonialTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(SettingTableSeeder::class);
    }
}
