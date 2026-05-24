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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id()->comment('Khóa chính của đơn đăng ký');
            $table->unsignedBigInteger('user_id')->comment('ID người dùng đăng ký');
            $table->unsignedBigInteger('experience_id')->comment('ID hoạt động trải nghiệm được đăng ký');
            $table->unsignedInteger('participants_count')->default(1)->comment('Số lượng người tham gia');
            $table->decimal('total_price', 12, 2)->default(0)->comment('Tổng số tiền của đơn đăng ký');
            $table->string('status')->default('pending')->comment('Trạng thái đơn: pending, confirmed hoặc canceled');
            $table->string('contact_name')->nullable()->comment('Tên người liên hệ');
            $table->string('contact_email')->nullable()->comment('Email người liên hệ');
            $table->string('contact_phone')->nullable()->comment('Số điện thoại người liên hệ');
            $table->text('note')->nullable()->comment('Ghi chú thêm của người đăng ký');
            $table->timestamp('created_at')->nullable()->comment('Thời điểm tạo bản ghi');
            $table->timestamp('updated_at')->nullable()->comment('Thời điểm cập nhật bản ghi');

            $table->index(['user_id', 'status']);
            $table->index(['experience_id', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
