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
        Schema::create('story_tags', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignIdFor(Story::class)->constrained()->cascadeOnDelete();

            $table->string('text')->index()->comment('タグ');
            $table->bigInteger('order')->default(0)->comment('ソート順');

            $table->timestamps();

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
        Schema::dropIfExists('story_tags');
    }
};
