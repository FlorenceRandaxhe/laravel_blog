<?php
use App\User;
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
        User::create([
            'name'      => 'Florence',
            'email'     => 'randaxhe.florence@gmail.com',
            'password'  => \Illuminate\Support\Facades\Hash::make('azerty')
        ]);

        User::create([
            'name'      => 'Morgane',
            'email'     => 'florence_randaxhe@hotmail.com',
            'password'  => \Illuminate\Support\Facades\Hash::make('azerty')
        ]);
    }
}