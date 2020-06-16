<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Stream\User;
use Stream\Model;
use Stream\Video;
use Stream\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'user_id' => function () {

            return factory(User::class)->create()->id;
        },

        'body' => $faker->sentence(6),

        'video_id' => function () {

            return factory(Video::class)->create()->id;
        },

        'comment_id' => null
    ];
});
