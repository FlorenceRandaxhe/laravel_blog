<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->sentence;
    return [
        'title' => $title,
        'slug' => Str::slug($title, '-'),
        'content' => $faker->paragraphs(3, true),
        'published_at' => $faker->dateTimeBetween('-3 years', '3 months'),
        'owner_id' =>
        rand(1,2)>1?
            User::first()->id:
            User::latest('id')->first()->id,

    ];
});
