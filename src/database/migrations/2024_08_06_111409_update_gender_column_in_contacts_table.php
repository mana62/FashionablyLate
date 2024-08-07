<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class UpdateGenderColumnInContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->string('gender')->comment('男性, 女性, その他')->change();
        });
        DB::table('contacts')->where('gender', 1)->update(['gender' => '男性']);
        DB::table('contacts')->where('gender', 2)->update(['gender' => '女性']);
        DB::table('contacts')->where('gender', 3)->update(['gender' => 'その他']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->tinyInteger('gender')->unsigned()->comment('1:男性, 2:女性, 3:その他')->change();
        });
        DB::table('contacts')->where('gender', '男性')->update(['gender' => 1]);
        DB::table('contacts')->where('gender', '女性')->update(['gender' => 2]);
        DB::table('contacts')->where('gender', 'その他')->update(['gender' => 3]);
    }
}
