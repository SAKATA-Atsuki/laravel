<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id')->comment('会員ID');
            $table->string('name_sei', 255)->comment('氏名（姓）');
            $table->string('name_mei', 255)->comment('氏名（名）');
            $table->string('nickname', 255)->comment('ニックネーム');
            $table->integer('gender')->comment('性別（1=男性、2=女性）');
            $table->string('password', 255)->comment('パスワード');
            $table->string('email', 255)->comment('メールアドレス');
            $table->integer('auth_code')->nullable($value = true)->comment('認証コード');
            $table->timestamp('created_at')->nullable($value = true)->comment('登録日時');
            $table->timestamp('updated_at')->nullable($value = true)->comment('編集日時');
            $table->timestamp('deleted_at')->nullable($value = true)->comment('削除日時');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
