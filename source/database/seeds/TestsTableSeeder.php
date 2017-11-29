<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate the table of tests.
        DB::table("tests")->truncate();
        // Insert a lot of data into the table of tests automatically.
        for ($i=0; $i <10 ; $i++) {
            DB::table("tests")->insert([
                'title'=>'title'.$i,
                'content'=>'content'.$i.str_random(20),
                'tag'=>'tag'.$i,
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString()
            ]);
        }
    }
}
