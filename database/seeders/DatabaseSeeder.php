<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public const USERNAME = 'admin';
    public const PASSWORD = 'password';
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /**
         * buat akun standar admin jika belum ada
         * 
         */
        
        if(!\App\Models\Admin::where('username', self::USERNAME)->exists()) {
            $user = \App\Models\Admin::factory()->create([
                'nama' => 'Admin',
                'username' => self::USERNAME,
                'password' => bcrypt(self::PASSWORD),
            ]);
        }
        // if(!\App\Models\User::where('username', self::USERNAME)->exists()) {
        //     $user = \App\Models\User::factory()->create([
        //         'nama' => 'Admin',
        //         'username' => self::USERNAME,
        //         'password' => bcrypt(self::PASSWORD),
        //     ]);
        // }
    }
}
