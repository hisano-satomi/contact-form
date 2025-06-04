<?php

namespace Database\Seeders;

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
        // 外部キー制約を一時的に無効化
        \DB::statement('SET FOREIGN_KEY_CHECKS=0');

        $this->call([
            CategorySeeder::class,
            ContactsTableSeeder::class,
        ]);

        // 外部キー制約を有効に戻す
        \DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
