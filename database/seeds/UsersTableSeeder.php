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
        //
        DB::table('users')->insert(
            [
                ['name'=>'adilson', 'email'=>'teste.adilson@gmail.com', 'password' => bcrypt('password'), 'isAdmin'=>0 ],
                ['name'=>'adilson1', 'email'=>'teste1.adilson@gmail.com', 'password' => bcrypt('password'), 'isAdmin'=>0 ],
                ['name'=>'Fernando', 'email'=>'teste2.adilson@gmail.com', 'password' => bcrypt('password'), 'isAdmin'=>0 ],
                ['name'=>'Joyce', 'email'=>'teste3.adilson@gmail.com', 'password' => bcrypt('password'), 'isAdmin'=>0 ],
                ['name'=>'Leonardo', 'email'=>'teste4.adilson@gmail.com', 'password' => bcrypt('password'), 'isAdmin'=>0 ],
                ['name'=>'Gabriel', 'email'=>'teste5.adilson@gmail.com', 'password' => bcrypt('password'), 'isAdmin'=>0 ],
                ['name'=>'Gabriela', 'email'=>'teste6.adilson@gmail.com', 'password' => bcrypt('password'), 'isAdmin'=>0 ],
                ['name'=>'nextem', 'email'=>'test@nextem.com.br', 'password' => bcrypt('1234'), 'isAdmin'=>1]
            ]
        );
    }
}
