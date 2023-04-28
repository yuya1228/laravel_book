<?php

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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('book_name')->comment('本のタイトル');
            $table->unsignedBigInteger('category_id')->comment('本のカテゴリーID');
            $table->string('image')->comment('画像');
            $table->string('text')->comment('本の内容');
            $table->integer('quantity')->comment('個数');
            $table->timestamps();

            // 外部キー制約
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
