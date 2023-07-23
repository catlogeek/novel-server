<?php

use App\Models\Story;
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
        Schema::create('episodes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignIdFor(Story::class)->constrained()->cascadeOnDelete();

            $table->text('title')->comment('タイトル');
            $table->text('body')->comment('本文');

            $table->unsignedSmallInteger('Status')->comment('ステータス');
            $table->bigInteger('order')->comment('ソート順');

            $table->timestamps();
            $table->softDeletes();

            $table->index([
                'story_id',
                'order',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('episodes');
    }
};
