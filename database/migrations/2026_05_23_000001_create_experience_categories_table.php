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
        Schema::create('experience_categories', function (Blueprint $table) {
            $table->id()->comment('Khóa chính của loại trải nghiệm');
            $table->string('name')->comment('Tên loại trải nghiệm');
            $table->string('slug')->unique()->comment('Chuỗi định danh dùng trên URL');
            $table->text('description')->nullable()->comment('Mô tả loại trải nghiệm');
            $table->timestamp('created_at')->nullable()->comment('Thời điểm tạo bản ghi');
            $table->timestamp('updated_at')->nullable()->comment('Thời điểm cập nhật bản ghi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experience_categories');
    }
};
