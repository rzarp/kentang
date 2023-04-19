<?php

use Illuminate\Database\Seeder;

class RuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = public_path('sql/rule.sql');
        $sql = file_get_contents($path);
        DB::unprepared($sql);
    }
}
