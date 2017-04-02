<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'avatar' => 'https://randomuser.me/api/portraits/' . $faker->randomElement(['men', 'women']) . '/' . rand(1,99) . '.jpg',
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Channel::class, function(\Faker\Generator $faker) {
    return [
        'name' => $faker->company,
        'logo' => $faker->imageUrl(60, 60),
        'cover' => $faker->imageUrl(944, 320),
        'about' => $faker->text(rand(100, 500)),
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        }
    ];
});

$factory->define(App\Category::class, function(\Faker\Generator $faker) {
    return [
        'name' => ucfirst($faker->words(rand(5,20), true))
    ];
});

$factory->define(App\Video::class, function(\Faker\Generator $faker) {
    return [
        'title' => ucfirst($faker->words(rand(5,20), true)),
        'description' => $faker->realText(rand(80, 600)),
        'published' => $faker->boolean(95),
        'url' => $faker->url,
        'thumbnail' => $faker->imageUrl(336, 188, null, true),
        'allow_comments' => $faker->boolean(80),
        'views' => $faker->randomDigit,
        'user_id' => function () {
            return App\User::inRandomOrder()->first()->id;
        },
        'category_id' => function() {
            $category = App\Category::inRandomOrder()->first();
            return $category ? $category->id : factory(App\Category::class)->create()->id;
        },
        'created_at' => $faker->dateTimeThisMonth
    ];
});

$factory->define(App\Comment::class, function(\Faker\Generator $faker) {
    return [
        'body' => $faker->realText(rand(10, 200)),
        'video_id' => function () {
            return App\Video::inRandomOrder()->first()->id;
        },
        'user_id' => function () {
            return App\User::inRandomOrder()->first()->id;
        },
        'created_at' => $faker->dateTimeThisMonth
    ];
});