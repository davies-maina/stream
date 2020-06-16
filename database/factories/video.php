<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Stream\Model;
use Stream\Video;
use Stream\Channel;
use Faker\Generator as Faker;

$factory->define(Video::class, function (Faker $faker) {
    return [
        'channel_id' => function () {

            return factory(Channel::class)->create()->id;
        },

        'views' => $faker->numberBetween(1, 1000),

        'thumbnail' => $faker->imageUrl(),

        'percentage' => 100,

        'title' => $faker->sentence(4),
        'description' => $faker->sentence(6),
        'path' => $faker->word()
    ];
});

/* $table->uuid('id');
$table->uuid('channel_id');
$table->bigInteger('views')->default(0);
$table->integer('percentage')->nullable();
$table->string('thumbnail')->nullable();
$table->string('title')->nullable();
$table->text('description')->nullable();
$table->string('path'); */