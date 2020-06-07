<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.se',
            'password' => '$2y$10$pa4eoeErr5Vt3Vgt.ATWPOooIlkc4xGK/cjcxuCxacSJJRo4Fo0Rm',
            'user_type_id' => 1,
        ]);
    }
}
