<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('contacts')->where('gender', '1')->update(['gender' => '男性']);
        DB::table('contacts')->where('gender', '2')->update(['gender' => '女性']);
        DB::table('contacts')->where('gender', '3')->update(['gender' => 'その他']);
    }
}
