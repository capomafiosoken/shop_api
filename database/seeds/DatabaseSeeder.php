<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'admin',
        ]);
        DB::table('roles')->insert([
            'name' => 'moderator',
        ]);
        DB::table('roles')->insert([
            'name' => 'user',
        ]);
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
            'email_verified_at' => now(),
            'role_id'=> '1',
            'remember_token'=> Str::random(25)
        ]);

        DB::table('regions')->insert([
            [
                'name'=>'Акмолинская область'
            ],
            [
                'name'=>'Актюбинская область'
            ],
            [
                'name'=>'Алматинская область'
            ],
            [
                'name'=>'Атырауская область'
            ],
        ]);
        DB::table('cities')->insert([
            [
                'region_id'=>1,
                'zip_code'=>'8359',
                'name'=>'Нур-Султан'
            ],
            [
                'region_id'=>1,
                'zip_code'=>'8360',
                'name'=>'Атбасар'
            ],
            [
                'region_id'=>2,
                'zip_code'=>'8364',
                'name'=>'Акшимрау'
            ],
            [
                'region_id'=>3,
                'zip_code'=>'8408',
                'name'=>'Алматы'
            ],
            [
                'region_id'=>4,
                'zip_code'=>'8427',
                'name'=>'Атырау'
            ],
        ]);
        DB::table('addresses')->insert([
            [
                'city_id'=>1,
                'zip_code'=>'6666',
                'address'=>'Дом Ерсына',
                'full_name'=>'Зачем нам это поле?',
                'telephone_number'=>'87021234567',
                'note'=>'ывфывфывфывфыввфыв ыфввфывф фывфы'
            ] ,
            [
                'city_id'=>2,
                'zip_code'=>'6666',
                'address'=>'Дом Азамата',
                'full_name'=>'Зачем нам это поле?',
                'telephone_number'=>'87021234567',
                'note'=>'ывфывфывфывфыввфыв ыфввфывф фывфы'
            ] ,
            [
                'city_id'=>3,
                'zip_code'=>'6666',
                'address'=>'Дом Галымжана',
                'full_name'=>'Зачем нам это поле?',
                'telephone_number'=>'87021234567',
                'note'=>'ывфывфывфывфыввфыв ыфввфывф фывфы'
            ] ,
        ]);
        DB::table('brands')->insert([
            [
                'name'=>'louis vuitton',
                'alias'=>'LV',
                'description'=>'ОписаниеLouis Vuitton — французский дом моды,
                специализирующийся на производстве чемоданов и сумок, модной одежды,
                парфюмерии и аксессуаров класса «люкс» под одноимённой торговой маркой.',
                //'image'=>'',

            ],
            [
                'name'=>'Supreme',
                'alias'=>'Supreme',
                'description'=>'Supreme — американский стритвер-бренд одежды, основанный в Нью-Йорке в апреле 1994 года',
                //'image'=>'',

            ],
            [
                'name'=>'hewlett packard',
                'alias'=>'HP',
                'description'=>'Hewlett-Packard — одна из крупнейших американских компаний в сфере информационных
                технологий, существовавшая в период 1939—2015 годов',
                //'image'=>'',

            ]
        ]);
        DB::table('categories')->insert([
            [
                'name'=>'Техника и электроника',
                'alias'=>'электротехника',
                'parent_id'=>null,
                'keyword'=>'электротехника',
                //'description'=>'',
                //'image'=>'image',
            ],
            [
                'name'=>'Ноутбуки и нетбуки',
                'alias'=>'ноуты',
                'parent_id'=>'1',
                'keyword'=>'ноуты',
                //'description'=>'',
                //'image'=>'image',
            ],
            [
                'name'=>'Одежда и обувь',
                'alias'=>'одежда',
                'parent_id'=>null,
                'keyword'=>'шмот',
                //'description'=>'',
                //'image'=>'image',
            ],
        ]);
        DB::table('currencies')->insert([
            [
                'name'=>'Тенге',
                'code'=>'KZT',
                'value'=>1,
                'base'=>'0',

            ]
        ]);
        DB::table('orders')->insert([
            [
                'user_id'=>1,
                'status'=>'0',
                'currency_id'=>1,
                'address_id'=>1,

            ],
            [
                'user_id'=>1,
                'status'=>'0',
                'currency_id'=>1,
                'address_id'=>2,

            ],
            [
                'user_id'=>1,
                'status'=>'0',
                'currency_id'=>1,
                'address_id'=>3,

            ],
        ]);
        DB::table('products')->insert([
            [
                'status'=>'0',
                'name'=>'Ноутбук HP 2RR85EA ProBook',
                'alias'=>'HP-2RR85EA',
                'brand_id'=>3,
                'price'=>441590,

            ],
            [
                'status'=>'0',
                'name'=>'КОФТА ONTHEGO GM',
                'alias'=>'ONTHEGO-GM',
                'brand_id'=>1,
                'price'=>800000,

            ],
            [
                'status'=>'0',
                'name'=>'Футболка Supreme',
                'alias'=>'shirt-supreme',
                'brand_id'=>2,
                'price'=>14490,

            ],
        ]);
        DB::table('category_product')->insert([
            [
                'category_id'=>2,
                'product_id'=>1,
            ],
            [
                'category_id'=>3,
                'product_id'=>2,
            ],
            [
                'category_id'=>3,
                'product_id'=>3,
            ],
        ]);
        DB::table('order_product')->insert([
            [
                'product_id'=>1,
                'order_id'=>1,
                'pieces'=>1,
                'price'=>441590,
            ],
            [
                'product_id'=>2,
                'order_id'=>2,
                'pieces'=>1,
                'price'=>800000,
            ],
            [
                'product_id'=>3,
                'order_id'=>3,
                'pieces'=>1,
                'price'=>14490,
            ],
        ]);
        DB::table('filter_groups')->insert([
            [
                'name'=>'Цвет',

            ],
            [
                'name'=>'Страна производитель',

            ],
            [
                'name'=>'Скидки',
            ],
            [
                'name'=>'Доставка',
            ]

        ]);
        DB::table('filter_values')->insert([
            [
                'value'=>'белый',
                'filter_group_id'=>1,
            ],
            [
                'value'=>'черный',
                'filter_group_id'=>1,
            ],
            [
                'value'=>'Америка',
                'filter_group_id'=>2,
            ],
            [
                'value'=>'Китай',
                'filter_group_id'=>2,
            ],
            [
                'value'=>'50%',
                'filter_group_id'=>3,
            ],
            [
                'value'=>'10%',
                'filter_group_id'=>3,
            ],
            [
                'value'=>'Нет',
                'filter_group_id'=>4,
            ],
            [
                'value'=>'Есть',
                'filter_group_id'=>4,
            ],
        ]);
        // $this->call(UserSeeder::class);
    }
}
