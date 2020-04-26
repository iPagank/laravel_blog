<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->sentence(rand(3,5));
    $text = $faker->text(100);
    $isPublished = rand(1,5) > 1;
    $created =  $faker->dateTimeBetween('-3 month','-1 month');
    return [
        'category_id' => rand(1,9),
        'user_id' => rand(1,2),
        'title' => $title,
        'slug' => Str::slug($title),
        'excerpt' => $faker->sentence(10),
        'content_raw' => $text,
        'content_html' => $text,
        'is_published' => $isPublished,
        'published_at' => $created,
        'img_url' => $faker->imageUrl()
    ];
});
