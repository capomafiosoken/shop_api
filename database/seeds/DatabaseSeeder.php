<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'admin',
        ]);
        DB::table('roles')->insert([
            'name' => 'moderator',
        ]);
        DB::table('roles')->insert([
            'name' => 'user',
        ]);
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
            'email_verified_at' => now(),
            'role_id'=> '1',
            'remember_token'=> Str::random(25)
        ]);

        DB::table('user_role')->insert([
            'user_id' => 1,
            'role_id' => 1,
        ]);
        DB::table('regions')->insert([
            [
                'name'=>'Акмолинская область'
            ],
            [
                'name'=>'Актюбинская область'
            ],
            [
                'name'=>'Алматинская область'
            ],
            [
                'name'=>'Атырауская область'
            ],
        ]);
        DB::table('cities')->insert([
            [
                'region_id'=>1,
                'zip_code'=>'8359',
                'name'=>'Нур-Султан'
            ],
            [
                'region_id'=>1,
                'zip_code'=>'8360',
                'name'=>'Атбасар'
            ],
            [
                'region_id'=>2,
                'zip_code'=>'8364',
                'name'=>'Акшимрау'
            ],
            [
                'region_id'=>3,
                'zip_code'=>'8408',
                'name'=>'Алматы'
            ],
            [
                'region_id'=>4,
                'zip_code'=>'8427',
                'name'=>'Атырау'
            ],
        ]);
        // $this->call(UserSeeder::class);
    }
}
