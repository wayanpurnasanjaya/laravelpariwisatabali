<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = User::create([
            'name'=>'Purna Sanjaya',
            'email'=>'wayanpurnasanjaya@gmail.com',
            'password'=>bcrypt('12345678'),
        ]);
        $administrator->assignRole('administrator');

        $contributor = User::create([
            'name'=>'Dewi Riyani',
            'email'=>'dewiriyani@gmail.com',
            'password'=> bcrypt('12345678'),
        ]);
        $contributor->assignRole('contributor');
    }
}
