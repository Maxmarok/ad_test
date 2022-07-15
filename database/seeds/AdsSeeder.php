<?php

use App\Ads;
use Illuminate\Database\Seeder;

class AdsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ru_RU');

        for($i = 0; $i < 1000; $i++) {
            $sources = [
                'https://upload.wikimedia.org/wikipedia/commons/thumb/0/02/Новый_логотип_Вконтакте_2022.jpg/800px-Новый_логотип_Вконтакте_2022.jpg',
                'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Instagram_icon.png/640px-Instagram_icon.png',
                'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d5/Facebook_F_icon.svg/2048px-Facebook_F_icon.svg.png',
                'https://logojinni.com/image/logos/tiktok-468.svg',
                'https://upload.wikimedia.org/wikipedia/commons/thumb/1/19/WhatsApp_logo-color-vertical.svg/2048px-WhatsApp_logo-color-vertical.svg.png',
                'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6d/Volkswagen_logo_2019.svg/1024px-Volkswagen_logo_2019.svg.png',
                'https://автолого.рф/wp-content/uploads/mercedes-benz-logo.png',
            ];

            $data[] = [
                'title'         => $faker->sentence(),
                'price'         => $faker->numberBetween(1, 50000),
                'photo'         => $faker->randomElement($sources),
                'photos'        => implode(',', $faker->randomElements($sources, $faker->numberBetween(1, 2))),
                'description'   => $faker->text(),
                'created_at'    => now(),
                'updated_at'    => now(),
            ];
        }

        Ads::insert($data);
    }
}
