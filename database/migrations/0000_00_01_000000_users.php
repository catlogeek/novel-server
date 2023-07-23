<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary()->comment('ID');

            $table->string('name')->comment('ユーザ名');
            $table->string('email')->unique()->comment('メールアドレス'); // TODO: citext
            $table->string('password')->comment('パスワード');

            $table->unsignedSmallInteger('Status')->comment('ステータス');
            $table->timestamp('email_verified_at')->nullable()->comment('メールアドレス認証');
            $table->rememberToken();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
