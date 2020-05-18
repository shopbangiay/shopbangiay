<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(BrandSeeder::class);
        $this->call(ProductSeeder::class);

    }
}
class BrandSeeder extends Seeder{
    public function run()
    {
        // $this->call(UserSeeder::class);
        // DB::table('brand_product')->insert([
        //     array('brand_name' => 'Adidas', 'brand_desc' => 'Adidas', 'brand_status' => '1'),
        //     array('brand_name' => 'Nike', 'brand_desc' => 'Nike', 'brand_status' => '1'),
        //     array('brand_name' => 'Jordan', 'brand_desc' => 'Jordan', 'brand_status' => '1'),
        //     array('brand_name' => 'Vans', 'brand_desc' => 'Vans', 'brand_status' => '1'),
        //     array('brand_name' => 'Converse', 'brand_desc' => 'Converse', 'brand_status' => '1')
        // ]);
    }
}
class ProductSeeder extends Seeder{
    public function run(){
        DB::table('product')->insert([
            array('product_name' => 'Giày Nike', 'product_desc' => 'Giày Nike của Mỹ', 'product_content' => "Giày Nike của Mẽo", 'product_price' => '300000', 'product_image' => '1.png', 'product_status' => '1', 'category_id' => '1', 'brand_id' => '2'),
            array('product_name' => 'Giày Adidas', 'product_desc' => 'Giày Adidas của Đức', 'product_content' => "Giày Adidas của Đức", 'product_price' => '500000', 'product_image' => '2.png', 'product_status' => '1', 'category_id' => '1', 'brand_id' => '1'),
            array('product_name' => 'Giày Jordan', 'product_desc' => 'Giày Jordan của Mỹ', 'product_content' => "Giày Jordan của Mỹ", 'product_price' => '700000', 'product_image' => '3.png', 'product_status' => '1', 'category_id' => '1', 'brand_id' => '3'),
            array('product_name' => 'Tất vớ Nike', 'product_desc' => 'Tất vớ Nike của Mỹ', 'product_content' => "Tất vớ Nike của Mỹ", 'product_price' => '50000', 'product_image' => '4.png', 'product_status' => '1', 'category_id' => '2', 'brand_id' => '2'),
            array('product_name' => 'Tất vớ Adidas', 'product_desc' => 'Tất vớ Adidas của Đức', 'product_content' => "Tất vớ Adidas của Đức", 'product_price' => '50000', 'product_image' => '5.png', 'product_status' => '1', 'category_id' => '2', 'brand_id' => '1'),
            array('product_name' => 'Tất vớ Jordan', 'product_desc' => 'Tất vớ Jordan của Mỹ', 'product_content' => "Tất vớ Jordan của Mỹ", 'product_price' => '50000', 'product_image' => '6.png', 'product_status' => '1', 'category_id' => '2', 'brand_id' => '3'),
        ]);
    }
}
