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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id()->comment('Khóa chính của hoạt động trải nghiệm');
            $table->unsignedBigInteger('experience_category_id')->comment('ID loại trải nghiệm');
            $table->unsignedBigInteger('organizer_id')->comment('ID người hoặc đơn vị tổ chức');
            $table->string('title')->comment('Tên hoạt động trải nghiệm');
            $table->string('slug')->unique()->comment('Chuỗi định danh dùng trên URL');
            $table->text('description')->nullable()->comment('Mô tả chi tiết hoạt động trải nghiệm');
            $table->string('location')->comment('Địa điểm diễn ra hoạt động');
            $table->decimal('price', 12, 2)->default(0)->comment('Giá tham gia hoạt động');
            $table->dateTime('start_at')->nullable()->comment('Thời gian bắt đầu hoạt động');
            $table->dateTime('end_at')->nullable()->comment('Thời gian kết thúc hoạt động');
            $table->string('image')->nullable()->comment('Đường dẫn hình ảnh đại diện');
            $table->unsignedInteger('max_participants')->nullable()->comment('Số lượng người tham gia tối đa');
            $table->string('status')->default('draft')->comment('Trạng thái hoạt động: draft hoặc published');
            $table->timestamp('created_at')->nullable()->comment('Thời điểm tạo bản ghi');
            $table->timestamp('updated_at')->nullable()->comment('Thời điểm cập nhật bản ghi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
