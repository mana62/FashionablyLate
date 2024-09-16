<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete()->comment('カテゴリID');
            $table->string('first_name', 255)->comment('名前（名）');
            $table->string('last_name', 255)->comment('名前（姓）');
            $table->string('gender')->comment('性別: 男性, 女性, その他');
            $table->string('email', 255)->comment('メールアドレス');
            $table->string('tell', 255)->comment('電話番号');
            $table->string('address', 255)->comment('住所');
            $table->string('building', 255)->nullable()->comment('建物名');
            $table->text('detail')->comment('お問い合わせ内容');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
