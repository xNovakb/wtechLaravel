<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Shipping;
use App\Models\ProductImages;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Shipping::create([
            'id' => 1,
            'shipping_type' => 'XYBox',
            'price' => 1.49,
            'time_delivery' => 'do 24 hod.'
        ]);

        User::create([
            'email' => 'admin@admin.sk',
            'email_verified_at' => '2022-05-06 14:30:00',
            'password' => Hash::make('adminadmin'),
            'tel_number' => '0000000000',
            'name_surname' => 'admin',
            'street' => 'Staré Grunty',
            'city' => 'Bratislava',
            'postalcode' => '84104',
        ]);

        $product1 = Product::firstOrCreate([
            'name' => 'Panske Rifle',
            'description' => 'Panske rifle',
            'price' => 10,
            'category_id' => 'Rifle',
            'brand_id' => 'Adidas',
            'color_id' => 'modrá',
            'size_id' => 'XS',
            'sex_id' => 'muž'
        ]);

        $product2 = Product::firstOrCreate([
            'name' => 'Tričko',
            'description' => 'Tričko s kratkym rukavom',
            'price' => 13,
            'category_id' => 'Tričká',
            'brand_id' => 'Nike',
            'color_id' => 'červená',
            'size_id' => 'S',
            'sex_id' => 'muž'
        ]);

        $product3 = Product::firstOrCreate([
            'name' => 'Spoločenské šaty',
            'description' => 'Šaty vhodné do spoločnosti',
            'price' => 15,
            'category_id' => 'Šaty',
            'brand_id' => 'Puma',
            'color_id' => 'ružová',
            'size_id' => 'M',
            'sex_id' => 'žena'
        ]);

        $product4 = Product::firstOrCreate([
            'name' => 'Čierna mikina',
            'description' => 'Mikina pre mužov',
            'price' => 10,
            'category_id' => 'Mikiny',
            'brand_id' => 'Lacoste',
            'color_id' => 'čierna',
            'size_id' => 'XL',
            'sex_id' => 'muž'
        ]);

        $product5 = Product::firstOrCreate([
            'name' => 'Hnedé nohavice',
            'description' => 'Hnedé nohavice',
            'price' => 25,
            'category_id' => 'Nohavice',
            'brand_id' => 'Mango',
            'color_id' => 'hnedá',
            'size_id' => 'XS',
            'sex_id' => 'žena'
        ]);

        $product6 = Product::firstOrCreate([
            'name' => 'Žltý sveter',
            'description' => 'Žltý sveter',
            'price' => 20,
            'category_id' => 'Svetre',
            'brand_id' => 'Tommy Hilfiger',
            'color_id' => 'žltá',
            'size_id' => 'L',
            'sex_id' => 'muž'
        ]);

        $product7 = Product::firstOrCreate([
            'name' => 'Rifľová Sukňa',
            'description' => 'Rifľová sukňa',
            'price' => 15,
            'category_id' => 'Sukne',
            'brand_id' => 'Mango',
            'color_id' => 'modrá',
            'size_id' => 'S',
            'sex_id' => 'žena'
        ]);

        $product8 = Product::firstOrCreate([
            'name' => 'Pánska košeľa',
            'description' => 'Pánska košeľa',
            'price' => 27,
            'category_id' => 'Košele',
            'brand_id' => 'GAP',
            'color_id' => 'biela',
            'size_id' => 'S',
            'sex_id' => 'muž'
        ]);

        $product9 = Product::firstOrCreate([
            'name' => 'Červená mikina',
            'description' => 'Mikina Adidas',
            'price' => 30,
            'category_id' => 'Mikiny',
            'brand_id' => 'Adidas',
            'color_id' => 'červená',
            'size_id' => 'XS',
            'sex_id' => 'muž'
        ]);

        $product10 = Product::firstOrCreate([
            'name' => 'Oranžová mikina',
            'description' => 'Mikina Nike',
            'price' => 35,
            'category_id' => 'Mikiny',
            'brand_id' => 'Nike',
            'color_id' => 'oranžová',
            'size_id' => 'M',
            'sex_id' => 'muž'
        ]);

        ProductImages::create([
            'product_id' => $product1->id,
            'image' => 'images/F8H43fcUHE3Jt5CKZ2WgVcK3a8jAMmo5f06hN7nr.jpg'
        ]);

        ProductImages::create([
            'product_id' => $product1->id,
            'image' => 'images/3Npz7rRuEDvgkbAiwZoZ56D0eA7EtxqYaRM2gsXj.jpg'
        ]);

        ProductImages::create([
            'product_id' => $product1->id,
            'image' => 'images/q5QeggjZyugaVwzc1A9h98MpzPKZHM5r0zTpQ6Hk.jpg'
        ]);

        ProductImages::create([
            'product_id' => $product2->id,
            'image' => 'images/bH2jKrJYr2x7qiD4iFHDSJkBLW5n7nCTgJBZKZCV.jpg'
        ]);

        ProductImages::create([
            'product_id' => $product2->id,
            'image' => 'images/kA6ULQuE43gNB3vdGRC4KxSHQnmcEILwpJG9u7ad.jpg'
        ]);

        ProductImages::create([
            'product_id' => $product3->id,
            'image' => 'images/A7dab5RFNnPjCIFw3PEngJCDFnsSY5v7JnJi4eNp.jpg'
        ]);

        ProductImages::create([
            'product_id' => $product3->id,
            'image' => 'images/OVNOD31y7yT3HA3qf583oejjTYS7fbySrY4JOpgr.jpg'
        ]);

        ProductImages::create([
            'product_id' => $product4->id,
            'image' => 'images/IHMHMUuJLX5G6LnoGbqqgJ3HlueGDh5nEe5igHah.png'
        ]);

        ProductImages::create([
            'product_id' => $product4->id,
            'image' => 'images/Rc3XytR12BD7vixp8Msr11DUiNASpXLbUB2VEk1b.png'
        ]);

        ProductImages::create([
            'product_id' => $product4->id,
            'image' => 'images/koo4xYE1x0eVcVojqMMhlzTvTqrVBL72WFI3IqKN.png'
        ]);

        ProductImages::create([
            'product_id' => $product5->id,
            'image' => 'images/WfITwL1dE5FPTWeV6FGPm5VhBYDBhSOfimF6wxg8.jpg'
        ]);

        ProductImages::create([
            'product_id' => $product5->id,
            'image' => 'images/zWcepJuGdo8VNa7fEjww6D67zuDFTMeZfsD6V9tt.jpg'
        ]);

        ProductImages::create([
            'product_id' => $product5->id,
            'image' => 'images/Q0M8z67k8RCL04xVMwoBBRAvX5Xfnastb1epBS7J.jpg'
        ]);

        ProductImages::create([
            'product_id' => $product6->id,
            'image' => 'images/oeimHqLNYWVhqkibcYuOCBNsBWQh53E4zp9NAHlJ.jpg'
        ]);

        ProductImages::create([
            'product_id' => $product6->id,
            'image' => 'images/AYQKRz9liPbTgA6dxPxMiI5Tjob3rTFNtPmb7YCH.jpg'
        ]);

        ProductImages::create([
            'product_id' => $product6->id,
            'image' => 'images/opM6kSBQhMyRsX1BMtrknh4XBHBPRGYAbZJKtAUL.jpg'
        ]);

        ProductImages::create([
            'product_id' => $product7->id,
            'image' => 'images/chq6rjbVS4opnC2Xg1enTyem8hntWveKUVMIbK2l.jpg'
        ]);

        ProductImages::create([
            'product_id' => $product7->id,
            'image' => 'images/2dNdxag2NsH1eIcmjxd9TsIKl241u7KJ06f4anrw.jpg'
        ]);

        ProductImages::create([
            'product_id' => $product8->id,
            'image' => 'images/OKIMfKZuLqL5NdniiiLrdOkQxCt6Ao2Oh4Zfpva0.jpg'
        ]);

        ProductImages::create([
            'product_id' => $product8->id,
            'image' => 'images/8EJk2csqrGv44vbE5DoSRBWYVCLbl5EPpu1y74ZV.jpg'
        ]);

        ProductImages::create([
            'product_id' => $product8->id,
            'image' => 'images/d1td5ot8Ru93jqBZ3wJMW7IYT5DeMsLg3sAYkyve.jpg'
        ]);

        ProductImages::create([
            'product_id' => $product9->id,
            'image' => 'images/xtjifVHAAssBYaxYL2d1X5EDjtpsSaBzYIkFUJGU.jpg'
        ]);

        ProductImages::create([
            'product_id' => $product9->id,
            'image' => 'images/yCFWT9IsstC06hiuu03cTPvSJvzWZVahAqxKuj1q.jpg'
        ]);

        ProductImages::create([
            'product_id' => $product10->id,
            'image' => 'images/nWpoEurMstdKKN6DuNSgeUtsQDFSZuH2WkolAwKX.jpg'
        ]);

        ProductImages::create([
            'product_id' => $product10->id,
            'image' => 'images/BojyKt1f675DJaekvUTp2ltw87lOP9GvmGHZ2mds.jpg'
        ]);

        ProductImages::create([
            'product_id' => $product10->id,
            'image' => 'images/Lnjadq1RFub1QxrYjmf61VR9urPpDRnuqgu1crQa.jpg'
        ]);

        Shipping::create([
            'id' => 2,
            'shipping_type' => 'Predajňa',
            'price' => 0,
            'time_delivery' => 'Ihneď'
        ]);

        Shipping::create([
            'id' => 3,
            'shipping_type' => 'Zasielkovňa',
            'price' => 1.99,
            'time_delivery' => '2-3 dni'
        ]);

        Shipping::create([
            'id' => 4,
            'shipping_type' => 'Slovenská pošta',
            'price' => 1.99,
            'time_delivery' => '2-3 dni'
        ]);

        Shipping::create([
            'id' => 5,
            'shipping_type' => 'Doručenie na adresu (DPD)',
            'price' => 3.49,
            'time_delivery' => '3-5 dní'
        ]);

        Payment::create([
            'id' => 1,
            'payment_type' => 'Kreditná karta',
            'price' => -1.00
        ]);

        Payment::create([
            'id' => 2,
            'payment_type' => 'PayPal',
            'price' => -1.00
        ]);

        Payment::create([
            'id' => 3,
            'payment_type' => 'Dobierka',
            'price' => 1.99
        ]);

        Payment::create([
            'id' => 4,
            'payment_type' => 'Prevod na účet',
            'price' => 1.00
        ]);
    }
}
