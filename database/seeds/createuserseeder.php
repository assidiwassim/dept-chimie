<?php

use Illuminate\Database\Seeder;
use App\User;
class createuserseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'sayfoun',
            'email' => 'saifeddinhajji@mail.com',
            'password' => bcrypt('123456'),
            'role' => "admin",
            'tel' =>  "22985027",
            'logo' => "logo.png",
        ]);
        User::create([
            'name' => 'sayfoun',
            'email' => 'saif@mail.com',
            'password' => bcrypt('123456'),
            'role' => "user",
            'tel' =>  "22985027",
            'logo' => "logo.png",
        ]);
    }
}
