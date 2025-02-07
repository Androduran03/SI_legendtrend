<?php

namespace Database\Seeders;

 use App\Models\User;
 use App\Models\barang;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        barang::factory(1)->create();
    

        User::create([
            'name' => 'relin',
            'phone' => 'Taga',
            'address' => '081232572980',
            'email' => 'relin@gmail.com',
            'password' =>bcrypt('password'),
            'is_admin' =>true
        ]);
       
    }
}
