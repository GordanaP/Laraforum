<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'name' => 'Gordana',
            'email' => 'g@gmail.com'
        ];

        factory(App\User::class)->create([
            'name' => $user['name'],
            'name' => $user['name'],
        ]);

        factory(App\User::class, 5)->create();
    }
}
