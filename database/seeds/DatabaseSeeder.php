<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Seeds\UserTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CurrencyTableSeeder::class);
        $this->call(WalletTableSeeder::class);
        $this->call(MoneyTableSeeder::class);
    }
}
