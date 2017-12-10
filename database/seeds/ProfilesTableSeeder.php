<?php

use App\User;
use Illuminate\Database\Seeder;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (User::all() as $user) {
            factory(App\Profile::class)->create([
                'user_id' => $user->id
            ]);
        }
    }
}
