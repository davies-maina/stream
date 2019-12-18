<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Stream\User;
use Stream\Model;
use Stream\Channel;
use Faker\Generator as Faker;
use Stream\Subscription;

$factory->define(Subscription::class, function (Faker $faker) {
    return [
        'user_id' => function () {

            return factory(User::class)->create()->id;
        },

        'channel_id' => function () {

            return factory(Channel::class)->create()->id;
        },
    ];
});
