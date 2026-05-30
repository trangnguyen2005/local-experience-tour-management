<?php

namespace Database\Seeders;

use App\Models\Experience;
use App\Models\ExperienceCategory;
use App\Models\Organizer;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ],
        );

        User::updateOrCreate(
            ['email' => 'user@example.com'],
            [
                'name' => 'Default User',
                'password' => Hash::make('password'),
                'role' => 'user',
            ],
        );

        $craft = ExperienceCategory::updateOrCreate(
            ['slug' => 'lang-nghe'],
            [
                'name' => 'Làng nghề',
                'description' => 'Các hoạt động trải nghiệm nghề thủ công truyền thống.',
            ],
        );

        $food = ExperienceCategory::updateOrCreate(
            ['slug' => 'am-thuc'],
            [
                'name' => 'Ẩm thực',
                'description' => 'Lớp học nấu ăn và khám phá món ăn địa phương.',
            ],
        );

        $culture = ExperienceCategory::updateOrCreate(
            ['slug' => 'van-hoa'],
            [
                'name' => 'Văn hóa',
                'description' => 'Trải nghiệm đời sống, nghệ thuật và văn hóa bản địa.',
            ],
        );

        $organizer = Organizer::updateOrCreate(
            ['email' => 'contact@localtour.test'],
            [
                'name' => 'Local Tour Studio',
                'phone' => '0901234567',
                'address' => 'Hội An, Quảng Nam',
                'description' => 'Đơn vị tổ chức các hoạt động trải nghiệm địa phương.',
            ],
        );

        Experience::updateOrCreate(
            ['slug' => 'lam-gom-thanh-ha'],
            [
                'experience_category_id' => $craft->id,
                'organizer_id' => $organizer->id,
                'title' => 'Làm gốm tại làng Thanh Hà',
                'description' => 'Tự tay tạo hình, trang trí và nung sản phẩm gốm cùng nghệ nhân địa phương.',
                'location' => 'Hội An',
                'price' => 250000,
                'start_at' => now()->addDays(5)->setTime(9, 0),
                'end_at' => now()->addDays(5)->setTime(11, 30),
                'image' => 'images/experiences/lam-gom-thanh-ha.jpg',
                'max_participants' => 12,
                'status' => 'published',
            ],
        );

        Experience::updateOrCreate(
            ['slug' => 'lop-nau-an-mien-trung'],
            [
                'experience_category_id' => $food->id,
                'organizer_id' => $organizer->id,
                'title' => 'Lớp nấu ăn món miền Trung',
                'description' => 'Đi chợ địa phương, chuẩn bị nguyên liệu và nấu các món đặc trưng miền Trung.',
                'location' => 'Đà Nẵng',
                'price' => 390000,
                'start_at' => now()->addDays(7)->setTime(8, 30),
                'end_at' => now()->addDays(7)->setTime(12, 0),
                'image' => 'images/experiences/lop-nau-an-mien-trung.jpg',
                'max_participants' => 10,
                'status' => 'published',
            ],
        );

        Experience::updateOrCreate(
            ['slug' => 'dem-nhac-dan-gian'],
            [
                'experience_category_id' => $culture->id,
                'organizer_id' => $organizer->id,
                'title' => 'Đêm nhạc dân gian',
                'description' => 'Gặp gỡ nghệ nhân, nghe nhạc cụ truyền thống và tìm hiểu câu chuyện văn hóa địa phương.',
                'location' => 'Huế',
                'price' => 180000,
                'start_at' => now()->addDays(10)->setTime(19, 30),
                'end_at' => now()->addDays(10)->setTime(21, 0),
                'image' => 'images/experiences/dem-nhac-dan-gian.jpg',
                'max_participants' => 30,
                'status' => 'published',
            ],
        );
    }
}
