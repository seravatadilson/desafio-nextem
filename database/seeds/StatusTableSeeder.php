<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('status')->insert(
            [
                ['name'=>'Done' ],
                ['name'=> 'WIP'],
                ['name'=>'Review' ],
                ['name'=> 'To Do']
            ]
        );
    }
}
