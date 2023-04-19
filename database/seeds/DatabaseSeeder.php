<?php

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
        // $this->call(UsersTableSeeder::class);
        $this->call(MasterDataSeeder::class);
        $this->call(KnowledgeSeeder::class);
        $this->call(RuleSeeder::class);
    }
}
