<?php

    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Str;

    class DatabaseSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            DB::table('users')->insert([
                'name' => 'admin-user',
                'email' => 'admin-user@gmail.com',
                'password' => Hash::make('password'),
            ]);

            DB::table('users')->insert([
                'name' => 'normal-user',
                'email' => 'normal-user@gmail.com',
                'password' => Hash::make('password'),
            ]);

            DB::table('roles')->insert([
                'name' => 'admin',
            ]);

            DB::table('roles')->insert([
                'name' => 'user',
            ]);

            DB::table('role_user')->insert([
                'role_id' => 1,
                'user_id' => 1,
            ]);

            DB::table('role_user')->insert([
                'role_id' => 2,
                'user_id' => 2,
            ]);
        }
    }
