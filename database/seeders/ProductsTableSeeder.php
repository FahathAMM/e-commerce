<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        DB::table('users')->truncate();


        $users = [
            [
                'name'          => 'admin',
                'email'          => 'admin@gmail.com',
                'password'   => Hash::make('12345678'),
                'role_as'        => '1',
                'first_name'       => 'mohamed',
                'last_name'         => 'fahath',
                'mobile'    => '0752388923',
                'address_one' => '617/bjamahiriya road sainthamaruthu-02',
                'address_two' => '',
                'city' => 'sainthamruthu',
                'district' => 'ampara',
                'country' => 'sri lanka',
                'pin_code' => '326589',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],

            [
                'name'          => 'fahath',
                'email'          => 'fahath@gmail.com',
                'password'   => Hash::make('12345678'),
                'role_as'        => '1',
                'first_name'       => 'mohamed',
                'last_name'         => 'fahath',
                'mobile'    => '0752388923',
                'address_one' => '617/bjamahiriya road sainthamaruthu-02',
                'address_two' => '',
                'city' => 'sainthamruthu',
                'district' => 'ampara',
                'country' => 'sri lanka',
                'pin_code' => '326589',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],

        ];

        foreach ($users as $user) {
            DB::table('users')->insert($user);
        }



        $categories = [
            [
                'name'          => 'mobile',
                'slug'          => 'mobile',
                'description'   => 'this is best mobiles',
                'status'        => '1',
                'popular'       => '1',
                'image'         => 'category/lCJrPhjyach279lntjCGHBExc0cDXuOYU4Fuf5YN.jpg',
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
                'image'         => 'category/kO3jv4sbOHwdLMedwsRgiDTYjQ5vgRIe9eHAvwix.jpg',
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
                'image'         => 'category/8TLFbVqOYlDQvJNrEQUBb4hDMOU6SImKcybB2Bg8.jpg',
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
                'image'         => 'category/Z2HFDBM05T8NDHbv4kZQKwjYuL2miY2YGpDY6c17.png',
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
                'image'         => 'category/AJrdOxyitd2Ift3YekKQX5TQcOT0mOEWLyp255dK.jpg',
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
                'image'         => 'category/HvpIbBnePPslcNX0tJKZxs9JWNb2dr3qe7WTLVh7.jpg',
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
                'image'             => 'product/3Yk3VdD9ZhMXDeKqxaxVst1VLeWvggPSioJIHJK3.jpg',
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
                'image'             => 'product/CaN5BTopD3l6I1bKVAEMFaJd7xLgvtxeLn5v7NcG.jpg',
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
                'image'             => 'product/o8VRRdHRRYCeysTyIHW9om0q9FzCfeSNM1rvadtA.jpg',
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
