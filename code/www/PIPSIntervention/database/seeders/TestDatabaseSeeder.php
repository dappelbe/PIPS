<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')
            ->insert([
                [
                    'name' => 'PIPS',
                    'email' => 'pips@ndorms.ox.ac.uk',
                    'password' => '$2y$10$8T9RWIS3n3WQPhKArjL/H.HhDs.PgNfJ8/usl/l/6ktInJvksbe62',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ]
            ]);
    }
}
