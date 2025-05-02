<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
             'name'=>'Sofa Da Cao Cấp Hiện Đại HD-23',
             'price' =>'320000.00',
             'saleprice'=>'200000.00',
             'buying' =>'346',
             'description'=>'Nâng tầm không gian sống với Sofa Da Cao Cấp Hiện Đại HD-23 – lựa chọn hoàn hảo cho những ai yêu thích sự tinh tế và đẳng cấp. Sản phẩm được bọc da thật cao cấp, mang lại cảm giác mềm mại và bền bỉ theo thời gian. Khung ghế làm từ gỗ tự nhiên chắc chắn, kết hợp với đệm mút đàn hồi cao, giúp bạn tận hưởng sự thoải mái tuyệt đối.

                Thiết kế hiện đại với đường nét tối giản nhưng không kém phần sang trọng, phù hợp với phòng khách, văn phòng, sảnh chờ hoặc những không gian cần sự đẳng cấp. Sản phẩm có nhiều tùy chọn màu sắc, dễ dàng phối hợp với nội thất.',
             'image' =>'sofa1_1.jpg',
             'quantity'=>'12',
             'categories_id' =>'2',
            ],
         ]);
    }
}
