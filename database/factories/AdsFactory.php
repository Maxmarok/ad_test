<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ads;
use Faker\Generator as Faker;

$factory->define(Ads::class, function (Faker $faker) {
    $sources = [
        'https://upload.wikimedia.org/wikipedia/commons/thumb/0/02/Новый_логотип_Вконтакте_2022.jpg/800px-Новый_логотип_Вконтакте_2022.jpg',
        'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Instagram_icon.png/640px-Instagram_icon.png',
        'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d5/Facebook_F_icon.svg/2048px-Facebook_F_icon.svg.png',
        'https://logojinni.com/image/logos/tiktok-468.svg',
        'https://upload.wikimedia.org/wikipedia/commons/thumb/1/19/WhatsApp_logo-color-vertical.svg/2048px-WhatsApp_logo-color-vertical.svg.png',
        'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6d/Volkswagen_logo_2019.svg/1024px-Volkswagen_logo_2019.svg.png',
        'https://автолого.рф/wp-content/uploads/mercedes-benz-logo.png',

    ];

    return [
        'title'         => $faker->sentence(),
        'price'         => $faker->numberBetween(1, 50000),
        'photos'        => implode(',', $faker->randomElements($sources, $faker->numberBetween(1, 3))),
        'description'   => $faker->text(),
        'created_at'    => now(),
        'updated_at'    => now(),
    ];
});
