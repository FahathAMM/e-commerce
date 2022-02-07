<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('categories')->truncate();
        DB::table('products')->truncate();

        $categories = [
            [
                'name'          => 'mobile',
                'slug'          => 'mobile',
                'description'   => 'this is best mobiles',
                'status'        => '1',
                'popular'       => '1',
                'image'         => 'computer',
                'meta_title'    => 'computer',
                'meta_keywords' => 'computer',
                'meta_describe' => 'computer',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'electrical',
                'slug'          => 'electrical',
                'description'   => 'this is best electrical',
                'status'        => '1',
                'popular'       => '1',
                'image'         => 'electrical',
                'meta_title'    => 'electrical',
                'meta_keywords' => 'electrical',
                'meta_describe' => 'electrical',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'fashion',
                'slug'          => 'electrical',
                'description'   => 'this is best fashion',
                'status'        => '1',
                'popular'       => '1',
                'image'         => 'fashion',
                'meta_title'    => 'fashion',
                'meta_keywords' => 'fashion',
                'meta_describe' => 'fashion',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'household',
                'slug'          => 'household',
                'description'   => 'this is best household',
                'status'        => '0',
                'popular'       => '0',
                'image'         => 'household',
                'meta_title'    => 'household',
                'meta_keywords' => 'household',
                'meta_describe' => 'household',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'furniture',
                'slug'          => 'furniture',
                'description'   => 'this is best furniture',
                'status'        => '0',
                'popular'       => '0',
                'image'         => 'furniture',
                'meta_title'    => 'furniture',
                'meta_keywords' => 'furniture',
                'meta_describe' => 'furniture',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'name'          => 'computer',
                'slug'          => 'electrical',
                'description'   => 'this is best computer',
                'status'        => '0',
                'popular'       => '0',
                'image'         => 'computer',
                'meta_title'    => 'computer',
                'meta_keywords' => 'computer',
                'meta_describe' => 'computer',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert($category);
        }

        $products = [
            [
                'category_id'       => '1',
                'name'              => 'samsung j5 prime',
                'slug'              => 'samsung-j5-prime',
                'small_description' => 'this is best mobiles',
                'description'       => 'this is best mobiles',
                'selling_price'     => '1000',
                'original_price'    => '2000',
                'qty'               => '100',
                'tex'               => '100',
                'status'            => '0',
                'trending'          => '0',
                'image'             => 'computer',
                'meta_title'        => 'samsung j5 prime',
                'meta_keyword'      => 'samsung j5 prime',
                'meta_description'  => 'samsung j5 prime',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'category_id'       => '1',
                'name'              => 'samsung m22 prime',
                'slug'              => 'samsung-m22-prime',
                'small_description' => 'this is best mobiles',
                'description'       => 'this is best mobiles',
                'selling_price'     => '1000',
                'original_price'    => '2000',
                'qty'               => '100',
                'tex'               => '100',
                'status'            => '0',
                'trending'          => '0',
                'image'             => 'computer',
                'meta_title'        => 'samsung m22 prime',
                'meta_keyword'      => 'samsung m22 prime',
                'meta_description'  => 'samsung m22 prime',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'category_id'       => '1',
                'name'              => 'samsung A3 prime',
                'slug'              => 'samsung-A3-prime',
                'small_description' => 'this is best mobiles',
                'description'       => 'this is best mobiles',
                'selling_price'     => '1000',
                'original_price'    => '2000',
                'qty'               => '100',
                'tex'               => '100',
                'status'            => '0',
                'trending'          => '0',
                'image'             => 'computer',
                'meta_title'        => 'samsung A3 prime',
                'meta_keyword'      => 'samsung A3 prime',
                'meta_description'  => 'samsung A3 prime',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
        ];
        foreach ($products as $product) {
            DB::table('products')->insert($product);
        }

    }
}
