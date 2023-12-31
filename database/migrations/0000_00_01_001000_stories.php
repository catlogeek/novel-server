<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stories', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();

            $table->text('title')->comment('タイトル');
            $table->unsignedSmallInteger('Genre')->index()->comment('ジャンル');
            $table->text('catchphrase')->nullable()->comment('キャッチフレーズ');
            $table->text('introduction')->nullable()->comment('紹介文');

            $table->unsignedSmallInteger('Status')->comment('ステータス');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stories');
    }
};
