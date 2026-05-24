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
        Schema::create('organizers', function (Blueprint $table) {
            $table->id()->comment('Khóa chính của người hoặc đơn vị tổ chức');
            $table->string('name')->comment('Tên người hoặc đơn vị tổ chức');
            $table->string('email')->nullable()->comment('Email liên hệ của người tổ chức');
            $table->string('phone')->nullable()->comment('Số điện thoại liên hệ');
            $table->string('address')->nullable()->comment('Địa chỉ của người hoặc đơn vị tổ chức');
            $table->text('description')->nullable()->comment('Thông tin mô tả về người tổ chức');
            $table->timestamp('created_at')->nullable()->comment('Thời điểm tạo bản ghi');
            $table->timestamp('updated_at')->nullable()->comment('Thời điểm cập nhật bản ghi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizers');
    }
};
