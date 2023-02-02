<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Simone Crescenzi',
                'email' => 'lazialett094@hotmail.it',
                'password' => Hash::make('Zarate94'),
            ],
            [
                'name' => 'Mario Rossi',
                'email' => 'mario.rossi@hotmail.it',
                'password' => Hash::make('Alessio96'),
            ],
            [
                'name' => 'Marco Bianchi',
                'email' => 'marco.bianchi@hotmail.it',
                'password' => Hash::make('Zarate94'),
            ]
        ];

        foreach($users as $user) {
            User::create($user);
        }
    }
}
